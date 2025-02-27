@extends('layout.dashboard')

@section('content')

<div x-data="JurusanData()" class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
    
  @include("jurusan.modal")

  <div class="mb-4 flex flex-col gap-5 px-6 sm:flex-row sm:items-center sm:justify-between">
      <div>
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
          Data Jurusan
        </h3>
      </div>
  
      <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
        <div class="flex flex-row items-center gap-2">
          {{-- <div class="relative inline-block">
              <button @click.prevent="openDropDownFilter = !openDropDownFilter" class="inline-flex h-10 items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                <svg class="fill-white stroke-current dark:fill-gray-800" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2.29004 5.90393H17.7067" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M17.7075 14.0961H2.29085" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M12.0826 3.33331C13.5024 3.33331 14.6534 4.48431 14.6534 5.90414C14.6534 7.32398 13.5024 8.47498 12.0826 8.47498C10.6627 8.47498 9.51172 7.32398 9.51172 5.90415C9.51172 4.48432 10.6627 3.33331 12.0826 3.33331Z" fill="" stroke="" stroke-width="1.5"></path>
                  <path d="M7.91745 11.525C6.49762 11.525 5.34662 12.676 5.34662 14.0959C5.34661 15.5157 6.49762 16.6667 7.91745 16.6667C9.33728 16.6667 10.4883 15.5157 10.4883 14.0959C10.4883 12.676 9.33728 11.525 7.91745 11.525Z" fill="" stroke="" stroke-width="1.5"></path>
                </svg>
      
                Filter
              </button>
              <div x-show="openDropDownFilter" @click.outside="openDropDownFilter = false" class="absolute left-0 top-full z-999 mt-2 w-full min-w-[260px] rounded-2xl border border-gray-200 bg-white p-3 shadow-theme-lg dark:border-gray-800 dark:bg-[#1E2635]">
                <ul class="flex flex-col gap-1">
                  <li>
                    <label>
                        <input type="radio" x-model="selectedFilter" value="" class="rounded-lg px-3 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-white/5">
                        None
                    </label>
                  </li>
                  <li>
                    <label>
                        <input type="radio" x-model="selectedFilter" value="over21" class="rounded-lg px-3 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-white/5">
                        Over 21
                    </label>
                  </li>
                  <li>
                    <input type="radio" x-model="selectedFilter" value="under21" class="rounded-lg px-3 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-white/5">
                      Under 21
                  </li>
                </ul>
              </div>
          </div>

          <div>
            <button class="px-4 py-3 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600" @click="isModalCreateOpen = !isModalCreateOpen">
              Add
            </button>
          </div> --}}

        </div>
      </div>
    </div>
  
    <div class="max-w-full overflow-x-auto">
      <div class="min-w-[1102px]">
        <!-- table header start -->
        <div class="grid grid-cols-8 border-t border-gray-100 bg-gray-50 px-6 py-3 dark:border-gray-800 dark:bg-gray-900">
          <div class="col-span-3 flex items-center">
            <div x-data="{checked: false}" class="flex items-center gap-3">
              <div @click="checked = !checked" class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px] bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700" :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' : 'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700' ">
                <svg :class="checked ? 'block' : 'hidden'" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden">
                  <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </div>
              <div>
                <span class="block text-theme-xs font-medium text-gray-500 dark:text-gray-400">
                  Kode Jurusan
                </span>
              </div>
            </div>
          </div>
          <div class="col-span-5 flex items-center">
            <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">
              Nama Jurusan
            </p>
          </div>
          {{-- <div class="col-span-1 flex items-center justify-center">
            <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">
              Action
            </p>
          </div> --}}
        </div>
        <!-- table header end -->
  
        <!-- table body start -->

        @foreach ($jurusan as $j)
          
            <!-- table item -->
            <div class="grid grid-cols-8 border-t border-gray-100 px-4 py-3.5 dark:border-gray-800 sm:px-6">
            <div class="col-span-3 flex items-center">
                <div x-data="{checked: false}" class="flex items-center gap-3">
                <div @click="checked = !checked" class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px] bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700" :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' : 'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700' ">
                    <svg :class="checked ? 'block' : 'hidden'" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden">
                    <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <div>
                    <span class="block text-theme-sm font-medium text-gray-700 dark:text-gray-400" 
                    >
                      {{ $j->kode_jurusan }}
                    </span>
                </div>
                </div>
            </div>
            <div class="col-span-5 flex items-center">
                <div class="flex items-center gap-3">
                    <div>
                        <span class="block text-theme-sm font-medium text-gray-700 dark:text-gray-400" 
                        >
                          {{ $j->nama_jurusan }}
                        </span>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
  
        
        <!-- table body end -->
      </div>
    </div>
  </div>

@endsection