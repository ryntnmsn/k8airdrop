<aside id="logo-sidebar" class="fixed top-0 left-0 z-30 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white">

      <span class="text-sm font-bold text-gray-500 py-3 block">MENU</span>

      <ul class="space-y-2 font-medium">
         <li class="border-b border-slate-100">
            <a wire:navigate href="{{ route('dashboard.index') }}" class="{{ request()->is('dashboard*') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800 ' }} flex items-center p-2 rounded-lg hover:bg-indigo-600 hover:text-slate-50 group">
               <div class='w-6'>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                   </svg>
               </div>
               <span class="ms-2">Dashboard</span>
            </a>
         </li>
         <li class="border-b border-slate-100">
            <button type="button" class="flex items-center w-full p-2 text-slate-800 transition duration-75 rounded-lg group hover:bg-indigo-600 hover:text-slate-50" aria-controls="dropdown" data-collapse-toggle="dropdown">
               <div class="w-6">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                   </svg>
               </div>
               <span class="flex-1 ms-2 text-left rtl:text-right whitespace-nowrap">Promos</span>
               <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
               </svg>
            </button>
            <ul id="dropdown" class="{{ request()->is('k8admin/platforms*') || request()->is('k8admin/promos*') || request()->is('k8admin/languages*') ? 'block' : 'hidden'}} py-2 space-y-1">
                  <li>
                     <a wire:navigate href="{{ route('promos.index') }}" class="{{ request()->is('k8admin/promos*') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800 '}} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-indigo-600 hover:text-slate-50">All</a>
                  </li>
                  <li>
                     <a wire:navigate href="{{ route('platforms.index') }}" class="{{ request()->is('k8admin/platforms*') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800 '}} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-indigo-600 hover:text-slate-50">Platforms</a>
                  </li>
                  <li>
                     <a wire:navigate href="{{ route('languages.index') }}" class="{{ request()->is('k8admin/languages*') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800' }} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-indigo-600 hover:text-slate-50">Languages</a>
                  </li>
                  <li>
                     <a wire:navigate href="{{ route('promos.create') }}" class="text-slate-800 flex space-x-1 items-center w-full p-2 transition duration-75 rounded-lg pl-5 group hover:bg-indigo-600 hover:text-slate-50">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-slot="icon" class="w-5 h-5">
                           <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                         </svg>
                        <span>Create Promo</span>
                     </a>
                  </li>
            </ul>
         </li>
         <li class="border-b border-slate-100">
            <button type="button" class="flex items-center w-full p-2 text-slate-800 transition duration-75 rounded-lg group hover:bg-indigo-600 hover:text-slate-50" aria-controls="dropdown-articles" data-collapse-toggle="dropdown-articles">
               <div class="w-6">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                   </svg>
               </div>
               <span class="flex-1 ms-2 text-left rtl:text-right whitespace-nowrap">Articles</span>
               <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
               </svg>
            </button>
            <ul id="dropdown-articles" class="{{ request()->is('k8admin/articles*') || request()->is('k8admin/articles/categories*') || request()->is('k8admin/articles/tags*') ? 'block' : 'hidden'}} py-2 space-y-1">
                  <li>
                     <a wire:navigate href="{{ route('articles.index') }}" class="{{ request()->is('k8admin/articles') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800 '}} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-indigo-600 hover:text-slate-50">All</a>
                  </li>
                  <li>
                     <a wire:navigate href="{{ route('articles.categories.index') }}" class="{{ request()->is('k8admin/articles/categories*') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800 '}} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-indigo-600 hover:text-slate-50">Categories</a>
                  </li>
                  <li>
                     <a wire:navigate href="{{ route('articles.subcategories.index') }}" class="{{ request()->is('k8admin/articles/subcategories*') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800 '}} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-indigo-600 hover:text-slate-50">Sub categories</a>
                  </li>
                  <li>
                     <a wire:navigate href="{{ route('articles.tags.index') }}" class="{{ request()->is('k8admin/articles/tags*') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800' }} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-indigo-600 hover:text-slate-50">Tags</a>
                  </li>
                  <li>
                     <a wire:navigate href="{{ route('articles.create') }}" class="{{ request()->is('k8admin/articles/create') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800' }} flex space-x-1 items-center w-full p-2 transition duration-75 rounded-lg pl-5 group hover:bg-indigo-600 hover:text-slate-50">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-slot="icon" class="w-5 h-5">
                           <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                         </svg>
                        <span>Create Article</span>
                     </a>
                  </li>
            </ul>
         </li>
         <li class="border-b border-slate-100">
            <a wire:navigate href="{{ route('carousel.index') }}" class="{{ request()->is('k8admin/carousels*') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800'}} flex items-center p-2 rounded-lg hover:bg-indigo-600 hover:text-slate-50 group">
               <div class="w-6">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125Z" />
                   </svg>
               </div>
               <span class="flex-1 ms-2 whitespace-nowrap">Carousel</span>
            </a>
         </li>
         <li class="border-b border-slate-100">
            <a wire:navigate href="{{ route('featured.games.index') }}" class="{{ request()->is('k8admin/featured-games*') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800 '}} flex items-center p-2 rounded-lg hover:bg-indigo-600 hover:text-slate-50 group">
               <div class="w-6">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 0 1-.657.643 48.39 48.39 0 0 1-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 0 1-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 0 0-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 0 1-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 0 0 .657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 0 1-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 0 0 5.427-.63 48.05 48.05 0 0 0 .582-4.717.532.532 0 0 0-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 0 0 .658-.663 48.422 48.422 0 0 0-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 0 1-.61-.58v0Z" />
                   </svg>
               </div>
               <span class="flex-1 ms-2 whitespace-nowrap">Featured Games</span>
            </a>
         </li>
         <li class="border-b border-slate-100">
            <a wire:navigate href="{{ route('user.index') }}" class="{{ request()->is('k8admin/users*') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800 '}} flex items-center p-2 rounded-lg hover:bg-indigo-600 hover:text-slate-50 group">
               <div class="w-6">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                   </svg>
               </div>
               <span class="flex-1 ms-2 whitespace-nowrap">Users Management</span>
            </a>
         </li>
         <li class="border-b border-slate-100">
            <a wire:navigate href="{{ route('subscription.index') }}" class="{{ request()->is('k8admin/subscriptions*') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800 '}} flex items-center p-2 rounded-lg hover:bg-indigo-600 hover:text-slate-50 group">
               <div class="w-6">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                   </svg>
               </div>
               <span class="flex-1 ms-2 whitespace-nowrap">Subscribers</span>
            </a>
         </li>
         <li class="border-b border-slate-100">
            <a wire:navigate href="{{ route('tracker.click.index') }}" class="{{ request()->is('k8admin/click-tracker*') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800 '}} flex items-center p-2 rounded-lg hover:bg-indigo-600 hover:text-slate-50 group">
               <div class="w-6">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                   </svg>
               </div>
               <span class="flex-1 ms-2 whitespace-nowrap">Click Tracker</span>
            </a>
         </li>
         <li class="border-b border-slate-100">
            <button type="button" class="flex items-center w-full p-2 text-slate-800 transition duration-75 rounded-lg group hover:bg-indigo-600 hover:text-slate-50" aria-controls="dropdown-spin" data-collapse-toggle="dropdown-spin">
               <div class="w-6">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                     <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                   </svg>
               </div>
               <span class="flex-1 ms-2 text-left rtl:text-right whitespace-nowrap">Spin the Wheel</span>
               <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
               </svg>
            </button>
            <ul id="dropdown-spin" class="{{ request()->is('k8admin/spin-the-wheel*') ? 'block' : 'hidden'}} py-2 space-y-1">
                  <li>
                     <a wire:navigate href="{{ route('spinthewheel.users.index') }}" class="{{ request()->is('k8admin/spin-the-wheel/users') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800 '}} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-indigo-600 hover:text-slate-50">Users</a>
                  </li>
                  <li>
                     <a wire:navigate href="{{ route('spinthewheel.index') }}" class="{{ request()->is('k8admin/spin-the-wheel') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800 '}} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-indigo-600 hover:text-slate-50">Settings</a>
                  </li>
                  <li>
                     <a wire:navigate href="{{ route('spinuserfaker.index') }}" class="{{ request()->is('k8admin/spin-the-wheel/user-faker') ? 'bg-indigo-600 text-slate-50' : 'text-slate-800 '}} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-indigo-600 hover:text-slate-50">User Faker</a>
                  </li>
            </ul>
         </li>
         <li class="border-b border-slate-100">
            <form action="{{ route('auth.logout') }}" method="post">
               @csrf
            <button type="submit" class="w-full flex items-center p-2 text-slate-800 rounded-lg hover:bg-rose-500 hover:text-slate-50 group">
               <div class="w-6">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" data-slot="icon" class="w-5 h-5">
                     <path fill-rule="evenodd" d="M17 4.25A2.25 2.25 0 0 0 14.75 2h-5.5A2.25 2.25 0 0 0 7 4.25v2a.75.75 0 0 0 1.5 0v-2a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 .75.75v11.5a.75.75 0 0 1-.75.75h-5.5a.75.75 0 0 1-.75-.75v-2a.75.75 0 0 0-1.5 0v2A2.25 2.25 0 0 0 9.25 18h5.5A2.25 2.25 0 0 0 17 15.75V4.25Z" clip-rule="evenodd" />
                     <path fill-rule="evenodd" d="M14 10a.75.75 0 0 0-.75-.75H3.704l1.048-.943a.75.75 0 1 0-1.004-1.114l-2.5 2.25a.75.75 0 0 0 0 1.114l2.5 2.25a.75.75 0 1 0 1.004-1.114l-1.048-.943h9.546A.75.75 0 0 0 14 10Z" clip-rule="evenodd" />
                   </svg>
               </div>
               <span class="ms-2 whitespace-nowrap">Logout</span>
            </button>
            </form>
         </li>
      </ul>
   </div>
</aside>

