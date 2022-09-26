<!-- le side bar --> 
     <div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            
        <div class="offcanvas-body p-1 ">
          <nav class="navbar-dark">
            <ul class="navbar-nav ">
                {{-- <li>
                  <div class="text-muted small fw-bold text-uppercase ">Core</div>
                </li> --}}
                <hr class="dropdown-divider mt-0" />
                <li class="ms-2">
                  <a href="{{route('dashboard')}}" class="nav-link px-1 active ">
                    {{-- <span> <i class="bi bi-speedometer2"></i></span> --}}
                    <span class="me-2 "><img src="/images/dashboard-line.png" alt=""></span>
                    <span>Dashboard</span>
                  </a>
                </li>
              
                  <hr class="dropdown-divider" />
            
                {{-- <li>
                  <div class="text-muted small fw-bold text-uppercase ">Interface</div>
              </li> --}}

             {{-- debut de la partie "élèves" --}}
             <li class="ms-2">
              <a class="nav-link px-1 active sidebar-link" href="{{route('readEleve')}}">
               <span class="me-2"><img src="/images/eleves.png" alt=""></span>
                <span>Elèves</span>
                {{-- <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span> --}}
              </a>
         
             {{-- fin de la partie élèves --}}

              <hr class="dropdown-divider" />
            {{-- les classes --}}
            <li class="ms-2">
              <a href="{{route('classes')}}" class="nav-link px-1 active">
                {{-- <span> <i class="bi bi-speedometer2"></i></span> --}}
                <span class="me-2 "><img src="/images/classe.png" alt=""></span>
                <span>Scolarité</span>
              </a>
            </li>
            {{-- fin des classes --}}
            <hr class="dropdown-divider" />

             {{-- les emploi du temps --}}
             <li class="ms-2">
              <a href="{{route('matieres')}}" class="nav-link px-1 active">
                {{-- <span> <i class="bi bi-speedometer2"></i></span> --}}
                <span class="me-2 "><img src="/images/emploi_du_temps.png" alt=""></span>
                <span>Matières</span>
              </a>
            </li>
            {{-- fin des emplo du temps --}}
            <hr class="dropdown-divider" />

            {{-- Professeurs --}}
            <li class="ms-2">
              <a  href="{{route('readProf')}}" class="nav-link px-1 active sidebar-link" >
               <span class="me-2"><img src="/images/eleves.png" alt=""></span>
                <span>Professeurs</span>
                {{-- <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span> --}}
              </a>
            {{-- fin  Professeurs --}}
            <hr class="dropdown-divider" />
            </ul>
          </nav>
        </div>
    </div>
  <!--fin du side bar  -->
    
