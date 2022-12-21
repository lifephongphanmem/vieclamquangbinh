<h2>Gửi tin nhắn</h2>
<form action="{{ route('messages.update', $thread->id) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}
        
    <!-- Message Form Input -->
    <div class="form-group">
        <textarea name="message" class="form-control" rows=10>{{ old('message') }}</textarea>
    </div>

        <div class="checkbox">
           
                <label title="">
                    <input type="checkbox" name="recipients[]" value="1" checked>Trung tâm DVVL tỉnh Quảng Bình
                </label>
          
        </div>
    

    <!-- Submit Form Input -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Gửi tin nhắn</button>
    </div>
</form>