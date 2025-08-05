<div class="col-12 col-md-3 border-end">    
    <div class="card-body">
        <h4 class="subheader">Setting Bussines</h4>
        <div class="list-group list-group-transparent">
            <a href="{{ route('setting') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('setting') ? 'active' : '' }}">Akun</a>
            <a href="{{ route('setting.companie.profile') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ Route::is('setting.companie.profile') ? 'active' : '' }}">Profile Perusahaan</a>
            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Seo Management</a>
        </div>
    </div>
</div>