<div class="row">
    <div class="col-md-12">
        <!-------awal menu----------->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <a class="navbar-brand" href="{{url('')}}">KEPEGAWAIAN</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('home')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Master Data
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('pegawai')}}">Pegawai</a>
                            <a class="dropdown-item" href="{{url('jabatan')}}">Jabatan</a>
                            <a class="dropdown-item" href="{{url('golongan')}}">Golongan</a>
                            <a class="dropdown-item" href="{{url('penggajihan')}}">Penggajihan</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('about')}}">About Us</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0" action="{{ url('/logout') }}" method="POST">
                    @csrf
                    @if($user_login == null){
                    <a href="{{url('login')}}" class="btn btn-success my-2 my-sm-0 mr-5" type="submit">Login</a>
                    @else
                    <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle mr-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$user_login->nama}}
                        </button>
                        <div class="dropdown-menu">
                            <button type="submit" class="dropdown-item">Logout</button>
                        </div>
                    </div>
                    @endif

                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <!--------akhir menu---------->
    </div>
</div>