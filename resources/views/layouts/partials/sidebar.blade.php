<div class="app-sidebar">
     <!-- Logo da Sidebar -->
      
     <div class="logo-box">
          <a href="{{ route('any', 'index') }}" class="logo-dark">
               <img src="/images/logo-dark.png" class="logo-sm" alt="logo pequena">
               <img src="/images/logo-dark.png" class="logo-lg" alt="logo escura">
          </a>
          <a href="{{ route('any', 'index') }}" class="logo-light">
               <img src="/images/logo-light.png" class="logo-sm" alt="logo pequena">
               <img src="/images/logo-light.png" class="logo-lg" alt="logo clara">
          </a>
     </div>

     <div class="scrollbar" data-simplebar>

          <ul class="navbar-nav" id="navbar-nav">

               <li class="menu-title">Menu</li>

               <li class="nav-item">
                    <a class="nav-link" href="{{ route('any', 'index') }}">
                         <span class="nav-icon">
                              <iconify-icon icon="solar:widget-2-outline"></iconify-icon>
                         </span>
                         <span class="nav-text"> Painel </span>
                    </a>
               </li>

               <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarAuthentication" data-bs-toggle="collapse" role="button"
                         aria-expanded="false" aria-controls="sidebarAuthentication">
                         <span class="nav-icon">
                              <iconify-icon icon="solar:user-circle-outline"></iconify-icon>
                         </span>
                         <span class="nav-text"> Autenticação </span>
                    </a>
                    <div class="collapse" id="sidebarAuthentication">
                         <ul class="nav sub-navbar-nav">
                              <li class="sub-nav-item">
                                   <a class="sub-nav-link" href="{{ route ('second' , ['auth','signin']) }}">Entrar</a>
                              </li>
                              <li class="sub-nav-item">
                                   <a class="sub-nav-link" href="{{ route ('second' , ['auth','signup']) }}">Cadastrar</a>
                              </li>
                              <li class="sub-nav-item">
                                   <a class="sub-nav-link" href="{{ route ('second' , ['auth','password']) }}">Redefinir Senha</a>
                              </li>
                              <li class="sub-nav-item">
                                   <a class="sub-nav-link" href="{{ route ('second' , ['auth','lock-screen']) }}">Tela de Bloqueio</a>
                              </li>
                         </ul>
                    </div>
               </li>
          </ul>
     </div>
</div>
