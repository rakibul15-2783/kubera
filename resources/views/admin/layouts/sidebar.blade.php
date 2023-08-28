
<nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
               <a class="sidebar-brand" href="">
               <h3 class="text-white">Kubera</h3>
               </a>
               <ul class="sidebar-nav">
                  <li class="sidebar-header">
                     Pages
                  </li>
                  <li class="sidebar-item ">
                     <a href="{{ route('admin.dashboard') }}"  class="sidebar-link collapsed">
                         <span class="align-middle">Dashboard</span>
                     </a>
                     <a href="{{ route('new.users') }}"  class="sidebar-link collapsed">
                         <span class="align-middle">New User</span>
                     </a>
                     <a href="{{ route('admin.password') }}"  class="sidebar-link collapsed">
                         <span class="align-middle">Change Password</span>
                     </a>
                  </li>
               </ul>
            </div>
         </nav>
