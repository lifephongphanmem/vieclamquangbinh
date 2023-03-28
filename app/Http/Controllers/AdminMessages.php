<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use DB;


class AdminMessages extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Session::has('admin')) {
                return redirect('/');
            };
            return $next($request);
        });
    }
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index()
    {
		$request = request();
		$state_filter = $request->state_filter;
        // All threads, ignore deleted/archived participants
        $threads = Thread::getAllLatest()->get();

        // All threads that user is participating in
        // $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();

        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();

        return view('admin.messenger.index', compact('threads','state_filter'))
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

            return redirect()->route('admessages');
        }

        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();

        // don't show the current user in list
        $userId = Auth::id();
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
		
        $thread->markAsRead($userId);

        return view('admin.messenger.show', compact('thread', 'users'));
    }

    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        $users = User::where('id', '!=', session('admin')->id)->get();

        return view('admin.messenger.create', compact('users'))
        ->with('baocao', getdulieubaocao());
    }

    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store(Request $request)
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
            if($request->recipients == 0){
                $user_id=array_column(User::where('phanloaitk',2)->where('status',1)->get()->toarray(),'id');
            }else{
                $dv_khaibao=array_column(DB::table('report')->wherein('table',['company','nguoilaodong','notable'])->where('MONTH(time)',date('m'))->get()->toarray(),'user');
                $user_id=array_column(User::wherenotin('id',$dv_khaibao)->get()->toarray(),'id');
            }
            $thread->addParticipant($user_id);
        }

        return redirect()->route('admessages');
    }

    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update(Request $request,$id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect()->route('admessages');
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
            'user_id' =>  session('admin')->id,
        ]);
        $participant->last_read = new Carbon;
        $participant->save();

        // Recipients
        if ($request->has('recipients')) {
            $thread->addParticipant($request->recipients);
        }

        return redirect()->route('admessages.show', $id);
    }
}
