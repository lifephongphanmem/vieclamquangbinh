<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class MessagesController extends Controller
{
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index()
    {
		
        // All threads, ignore deleted/archived participants
        $threads = Thread::getAllLatest()->get();

		$userId = session('admin')->id;
		foreach ($threads as $key=>$th){
            // dd($th->latestMessage->body);
			if (!$th->hasParticipant($userId)){
				unset( $threads[$key]);
			}
		}
		// dd($threads);
        // All threads that user is participating in
        // $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();

        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();

        return view('pages.messenger.index', compact('threads'))
        ->with('baocao', getdulieubaocao());
    }

    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {

        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect()->route('messages');
        }

        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();

        // don't show the current user in list
        $userId = session('admin')->id;
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();

        $thread->markAsRead($userId);

        return view('pages.messenger.show', compact('thread', 'users'))
        ->with('baocao', getdulieubaocao());
    }

    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        $users = User::where('id', '!=', session('admin')->id)->get();

        return view('pages.messenger.create', compact('users'))
        ->with('baocao', getdulieubaocao());
    }

    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store(Request $request )
    {
        $input = $request->all();
		$attach_path="";
		$attach =$request->File('attach');
		if($attach){
			$attach_path= $attach->store('CONGVAN');
		}
        $thread = Thread::create([
            'subject' => $input['subject'],
            'attach' => $attach_path,
        ]);

        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => session('admin')->id,
            'body' => $input['message'],
        ]);

        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => session('admin')->id,
            'last_read' => new Carbon,
        ]);

        // Recipients
        if ($request->has('recipients')) {
            $thread->addParticipant($input['recipients']);
        }

        return redirect()->route('messages');
    }

    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect()->route('messages');
        }

        $thread->activateAllParticipants();

        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => session('admin')->id,
            'body' => $request->message,
        ]);

        // Add replier as a participant
        $participant = Participant::firstOrCreate([
            'thread_id' => $thread->id,
            'user_id' => session('admin')->id,
        ]);
        $participant->last_read = new Carbon;
        $participant->save();

        // Recipients
        if ($request->has('recipients')) {
            $thread->addParticipant($request->recipients);
        }

        return redirect()->route('messages.show', $id);
    }
}
