
    <!-- debut du navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <!-- pour contenir le logo et le nom de l'ecole -->
         
         <div class="container-fluid">
           <!-- declancheur hors canevas  -->
             <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
               <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
             </button>  
           <!-- declancheur hors canevas  -->
               <a class="navbar-brand fw-bold text-uppercase me-auto" href="/eleve">myschools</a>
               <button class="navbar-toggler my-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <!--  -->
    
 
            <!-- faire les recherche -->
            <form class="d-flex ms-auto" role="search" >
              <div class="input-group ">
                <input type="text" class="form-control" placeholder="Rechercher" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-primary " type="button" id="button-addon2">
                  <i class="bi bi-search"></i>
                </button>
              </div>
            </form>
            <!--  -->
            <!-- profil utilisateur -->
            <span class="text text-white ms-3">{{$data->nom}}</span>
             <ul class="navbar-nav mb-2 mb-lg-0">
                 <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         <i class="bi bi-person-fill"></i>  
                       </a>
                       <ul class="dropdown-menu dropdown-menu-end ">
                       <li><a class="dropdown-item" href="#">Action</a></li>
                       <li><a class="dropdown-item" href="#">Another action</a></li>
                       <li><hr class="dropdown-divider"></li>
                       <li><a class="dropdown-item" href="{{route('logout')}}">Se deconnecter</a></li>
                       </ul>
                 </li>
              
             </ul>
             <!--  -->
           </div>
         </div>
     </nav>
     <!-- fin du navbar -->
     
