@auth
    <div style="margin-bottom: 20px; font-size: 20px;">
        <span>Chao mung </span><span style="font-weight: 900; color: blue;">{!! Auth::user()->name !!}</span>
    </div>
@endauth

@guest
    <div>The user is not authenticated...</div>
@endguest
