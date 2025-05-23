 @php
 use App\Models\Sitesetting;

 $data = Sitesetting::first();
 @endphp
 <!-- Spinner Start -->
 <div id="spinner"
     class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
     <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
         <span class="sr-only">Loading...</span>
     </div>
 </div>
 <!-- Spinner End -->

 <div class="sidebar pe-4 pb-3">
     <nav class="navbar bg-secondary navbar-dark">
         @if(!empty($data))
         <a href="#"class="navbar-brand mx-4 mb-3">
             <h3 class="text-primary"><i class="fa fa-plane-departure me-2"></i>{{$data->name}}</h3>
         </a>
         @endif
         <div class="d-flex align-items-center ms-4 mb-4">
             @if(!empty($data))
             <div class="position-relative">
                 <img class="rounded-circle" src="{{asset('storage/sitesetting/'.$data->logo)}}" alt=""
                     style="width: 40px; height: 40px;">
                 <div
                     class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                 </div>
             </div>
             @else
             <div class="position-relative">
                 <img class="rounded-circle" src="" alt="" style="width: 40px; height: 40px;">
                 <div
                     class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                 </div>
             </div>
             @endif
             <div class="ms-3">
                 <h6 class="mb-0"></h6>
                 <span>Admin</span>
             </div>
         </div>
         <div class="navbar-nav w-100">
             <a href="{{route('dashboard')}}" class="nav-item nav-link active"><i
                     class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                         class="fa fa-laptop me-2"></i>Sitesetting</a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="{{route('view.sitesetting')}}" class="dropdown-item">Sitesetting</a>
                     <a href="{{route('view.banner')}}" class="dropdown-item">Banner</a>
                     <a href="#" class="dropdown-item">Aboutus</a>
                 </div>
             </div>

             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                         class="fa fa-phone me-2"></i>Contact</a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="{{route('view.contact')}}" class="dropdown-item">Contact</a>
                     <a href="{{route('view.medialink')}}" class="dropdown-item">Media Links</a>
                 </div>
             </div>

             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                         class="fa fa-phone me-2"></i>Food Menu</a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="#" class="dropdown-item">Category</a>
                     <a href="#" class="dropdown-item">Sub-Category</a>
                     <a href="#" class="dropdown-item">Items</a>
                 </div>
             </div>

             <a href="{{route('view.gallery')}}" class="nav-item nav-link"><i class="fa fa-image me-2"></i>Gallery</a>

             <a href="{{route('view.service')}}" class="nav-item nav-link"><i class="fa fa-smile me-2"></i>Services</a>

             <a href="{{route('view.testimonial')}}" class="nav-item nav-link"><i
                     class="fa fa-table me-2"></i>Testimonial</a>

             {{-- <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a> --}}

             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                         class="far fa-file-alt me-2"></i>Pages</a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="signin.html" class="dropdown-item">Sign In</a>
                     <a href="signup.html" class="dropdown-item">Sign Up</a>
                     <a href="404.html" class="dropdown-item">404 Error</a>
                     <a href="blank.html" class="dropdown-item">Blank Page</a>
                 </div>
             </div>
         </div>
     </nav>
 </div>