
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
                     <a href="{{ route('all.project') }}"  class="sidebar-link collapsed">
                         <span class="align-middle">Projects</span>
                     </a>
                     <a href="{{ route('new.user.list') }}"  class="sidebar-link collapsed">
                         <span class="align-middle">User Request</span>
                     </a>
                     <a href="{{ route('user.list') }}"  class="sidebar-link collapsed">
                         <span class="align-middle">User</span>
                     </a>
                     <a href="{{ route('plan') }}"  class="sidebar-link collapsed">
                         <span class="align-middle">Subscription</span>
                     </a>
                     <a href="{{ route('point') }}"  class="sidebar-link collapsed">
                         <span class="align-middle">Points</span>
                     </a>
                  </li>
               </ul>
            </div>
         </nav>
