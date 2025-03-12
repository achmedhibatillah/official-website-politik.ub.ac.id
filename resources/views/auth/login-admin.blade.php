<div class="d-flex justify-content-center align-items-center bg-clr5" style="min-height:100vh;padding:100px 0;">
    <div class="border-clr1 text-clr1" style="width:300px;">
        <div class="bg-clr1 px-3 py-1">
            <img src="{{ asset('assets/images/static/logo.png') }}" class="wr-40">
        </div>
        <form action="{{ url('authentication-admin') }}" method="post" class="p-3">
            @csrf
            <label for="auth_token">Token Autentikasi</label>
            <input type="password" name="auth_token" class="w-100 border-clr1 px-2">
            @error('auth_token')
                <div class="text-clr1 fsz-10 mt-1">{{ $message }}</div>
            @enderror
            @if(session('error'))
                <div class="text-clr1 fsz-10 mt-1">{{ session('error') }}</div>
            @endif
            <button type="submit" class="btn-clr1 px-2 mt-3">Login</button>
        </form>
    </div>
</div>
