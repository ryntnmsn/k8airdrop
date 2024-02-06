<aside id="logo-sidebar" class="fixed top-0 left-0 z-30 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white">

      <span class="text-sm font-bold text-gray-500 py-3 block">MENU</span>

      <ul class="space-y-2 font-medium">
         <li class="border-b border-slate-100">
            <a wire:navigate href="{{ route('dashboard.index') }}" class="{{ request()->is('dashboard*') ? 'bg-indigo-500 text-slate-50' : 'text-slate-800 ' }} flex items-center p-2 rounded-lg hover:bg-indigo-500 hover:text-slate-50 group">
               <div class='w-6'>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                   </svg>
               </div>
               <span class="ms-2">Dashboard</span>
            </a>
         </li>
         <li class="border-b border-slate-100">
            <button type="button" class="flex items-center w-full p-2 text-slate-800 transition duration-75 rounded-lg group hover:bg-indigo-500 hover:text-slate-50" aria-controls="dropdown" data-collapse-toggle="dropdown">
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
            <ul id="dropdown" class="{{ request()->is('admin/platforms*') || request()->is('admin/promos*') || request()->is('admin/languages*') ? 'block' : 'hidden'}} py-2 space-y-1">
                  <li>
                     <a wire:navigate href="{{ route('promos.index') }}" class="{{ request()->is('admin/promos*') ? 'bg-indigo-500 text-slate-50' : 'text-slate-800 '}} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-indigo-500 hover:text-slate-50">All</a>
                  </li>
                  <li>
                     <a wire:navigate href="{{ route('platforms.index') }}" class="{{ request()->is('admin/platforms*') ? 'bg-indigo-500 text-slate-50' : 'text-slate-800 '}} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-indigo-500 hover:text-slate-50">Platforms</a>
                  </li>
                  <li>
                     <a wire:navigate href="{{ route('languages.index') }}" class="{{ request()->is('admin/languages*') ? 'bg-indigo-500 text-slate-50' : 'text-slate-800' }} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-indigo-500 hover:text-slate-50">Languages</a>
                  </li>
                  <li>
                     <a wire:navigate href="{{ route('promos.create') }}" class="text-slate-800 flex space-x-1 items-center w-full p-2 transition duration-75 rounded-lg pl-5 group hover:bg-indigo-500 hover:text-slate-50">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-slot="icon" class="w-5 h-5">
                           <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                         </svg>
                        <span>Create Promo</span>
                     </a>
                  </li>
            </ul>
         </li>
         <li class="border-b border-slate-100">
            <a wire:navigate href="#" class="flex items-center p-2 text-slate-800 rounded-lg hover:bg-indigo-500 hover:text-slate-50 group">
               <div class="w-6">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                   </svg>
               </div>
               <span class="flex-1 ms-2 whitespace-nowrap">Articles</span>
            </a>
         </li>
         <li class="border-b border-slate-100">
            <a wire:navigate href="#" class="flex items-center p-2 text-slate-800 rounded-lg hover:bg-indigo-500 hover:text-slate-50 group">
               <div class="w-6">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                   </svg>
               </div>
               <span class="flex-1 ms-2 whitespace-nowrap">Users Management</span>
            </a>
         </li>
         <li class="border-b border-slate-100">
            <a wire:navigate href="#" class="flex items-center p-2 text-slate-800 rounded-lg hover:bg-indigo-500 hover:text-slate-50 group">
               <div class="w-6">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                   </svg>
               </div>
               <span class="flex-1 ms-2 whitespace-nowrap">Subscribers</span>
            </a>
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

