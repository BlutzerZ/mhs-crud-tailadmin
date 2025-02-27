@extends('layout.dashboard')

@section('content')

<div x-data="mahasiswaData()" class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
    
  @include("mahasiswa.modal")

  <div class="mb-4 flex flex-col gap-5 px-6 sm:flex-row sm:items-center sm:justify-between">
      <div>
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
          Data Mahasiswa
        </h3>
      </div>
  
      <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
        <form>
          <div class="relative">
            <button class="absolute left-4 top-1/2 -translate-y-1/2">
              <svg class="fill-gray-500 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04199 9.37381C3.04199 5.87712 5.87735 3.04218 9.37533 3.04218C12.8733 3.04218 15.7087 5.87712 15.7087 9.37381C15.7087 12.8705 12.8733 15.7055 9.37533 15.7055C5.87735 15.7055 3.04199 12.8705 3.04199 9.37381ZM9.37533 1.54218C5.04926 1.54218 1.54199 5.04835 1.54199 9.37381C1.54199 13.6993 5.04926 17.2055 9.37533 17.2055C11.2676 17.2055 13.0032 16.5346 14.3572 15.4178L17.1773 18.2381C17.4702 18.531 17.945 18.5311 18.2379 18.2382C18.5308 17.9453 18.5309 17.4704 18.238 17.1775L15.4182 14.3575C16.5367 13.0035 17.2087 11.2671 17.2087 9.37381C17.2087 5.04835 13.7014 1.54218 9.37533 1.54218Z" fill=""></path>
              </svg>
            </button>
            <input x-model="searchMhs" type="text" placeholder="Search..." class="dark:bg-dark-900 h-10 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pl-[42px] pr-4 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800 xl:w-[300px]">
          </div>
        </form>
        <div class="flex flex-row items-center gap-2">
          <div class="relative inline-block">
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
          </div>

        </div>
      </div>
    </div>
  
    <div class="max-w-full overflow-x-auto">
      <div class="min-w-[1102px]">
        <!-- table header start -->
        <div class="grid grid-cols-8 border-t border-gray-100 bg-gray-50 px-6 py-3 dark:border-gray-800 dark:bg-gray-900">
          <div class="col-span-1 flex items-center">
            <div x-data="{checked: false}" class="flex items-center gap-3">
              <div @click="checked = !checked" class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px] bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700" :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' : 'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700' ">
                <svg :class="checked ? 'block' : 'hidden'" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden">
                  <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </div>
              <div>
                <span class="block text-theme-xs font-medium text-gray-500 dark:text-gray-400">
                  NIM
                </span>
              </div>
            </div>
          </div>
          <div class="col-span-1 flex items-center">
            <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">
              Nama Lengkap
            </p>
          </div>
          <div class="col-span-1 flex items-center">
            <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">
              Jurusan
            </p>
          </div>
          <div class="col-span-1 flex items-center">
            <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">
              Tempat Lahir
            </p>
          </div>
          <div class="col-span-1 flex items-center">
            <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">
              Tanggal Lahir
            </p>
          </div>
          <div class="col-span-1 flex items-center">
            <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">
              Alamat Lengkap
            </p>
          </div>
          <div class="col-span-1 flex items-center justify-center">
            <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">
              Action
            </p>
          </div>
        </div>
        <!-- table header end -->
  
        <!-- table body start -->

        <template x-for="mhs in mahasiswa" :key="mhs.nim">
            <!-- table item -->
            <div class="grid grid-cols-8 border-t border-gray-100 px-4 py-3.5 dark:border-gray-800 sm:px-6">
            <div class="col-span-1 flex items-center">
                <div x-data="{checked: false}" class="flex items-center gap-3">
                <div @click="checked = !checked" class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px] bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700" :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' : 'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700' ">
                    <svg :class="checked ? 'block' : 'hidden'" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden">
                    <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <div>
                    <span class="block text-theme-sm font-medium text-gray-700 dark:text-gray-400" 
                        x-text="mhs.nim"
                    >
                    </span>
                </div>
                </div>
            </div>
            <div class="col-span-1 flex items-center">
                <div class="flex items-center gap-3">
                    <div>
                        <span class="block text-theme-sm font-medium text-gray-700 dark:text-gray-400" 
                            x-text="mhs.nama_lengkap"
                        >
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-span-1 flex items-center">
                <p class="text-theme-sm text-gray-700 dark:text-gray-400"
                    x-text="mhs.jurusan.nama_jurusan"
                >
                </p>
            </div>
            <div class="col-span-1 flex items-center">
                <p class="text-theme-sm text-gray-700 dark:text-gray-400"
                    x-text="mhs.tempat_lahir"
                >
                </p>
            </div>
            <div class="col-span-1 flex items-center">
                <p class="text-theme-sm text-gray-700 dark:text-gray-400"
                    x-text="mhs.tanggal_lahir"
                >
                </p>
            </div>
            <div class="col-span-1 flex items-center">
                <p class="text-theme-sm text-gray-700 dark:text-gray-400"
                    x-text="mhs.alamat_lengkap"
                >
                </p>
            </div>
            <div class="col-span-1 flex w-full items-center justify-center gap-2">
            
              <button @click="loadEditUser(mhs)" class="text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white/90">
                <svg class="fill-current" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0911 3.53206C16.2124 2.65338 14.7878 2.65338 13.9091 3.53206L5.6074 11.8337C5.29899 12.1421 5.08687 12.5335 4.99684 12.9603L4.26177 16.445C4.20943 16.6931 4.286 16.9508 4.46529 17.1301C4.64458 17.3094 4.90232 17.3859 5.15042 17.3336L8.63507 16.5985C9.06184 16.5085 9.45324 16.2964 9.76165 15.988L18.0633 7.68631C18.942 6.80763 18.942 5.38301 18.0633 4.50433L17.0911 3.53206ZM14.9697 4.59272C15.2626 4.29982 15.7375 4.29982 16.0304 4.59272L17.0027 5.56499C17.2956 5.85788 17.2956 6.33276 17.0027 6.62565L16.1043 7.52402L14.0714 5.49109L14.9697 4.59272ZM13.0107 6.55175L6.66806 12.8944C6.56526 12.9972 6.49455 13.1277 6.46454 13.2699L5.96704 15.6283L8.32547 15.1308C8.46772 15.1008 8.59819 15.0301 8.70099 14.9273L15.0436 8.58468L13.0107 6.55175Z" fill=""></path>
                </svg>
              </button>
            
              <button @click="confirmDelete(mhs.nim)" class="text-gray-500 hover:text-error-500 dark:text-gray-400 dark:hover:text-error-500">
                <svg class="fill-current" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.04142 4.29199C7.04142 3.04935 8.04878 2.04199 9.29142 2.04199H11.7081C12.9507 2.04199 13.9581 3.04935 13.9581 4.29199V4.54199H16.1252H17.166C17.5802 4.54199 17.916 4.87778 17.916 5.29199C17.916 5.70621 17.5802 6.04199 17.166 6.04199H16.8752V8.74687V13.7469V16.7087C16.8752 17.9513 15.8678 18.9587 14.6252 18.9587H6.37516C5.13252 18.9587 4.12516 17.9513 4.12516 16.7087V13.7469V8.74687V6.04199H3.8335C3.41928 6.04199 3.0835 5.70621 3.0835 5.29199C3.0835 4.87778 3.41928 4.54199 3.8335 4.54199H4.87516H7.04142V4.29199ZM15.3752 13.7469V8.74687V6.04199H13.9581H13.2081H7.79142H7.04142H5.62516V8.74687V13.7469V16.7087C5.62516 17.1229 5.96095 17.4587 6.37516 17.4587H14.6252C15.0394 17.4587 15.3752 17.1229 15.3752 16.7087V13.7469ZM8.54142 4.54199H12.4581V4.29199C12.4581 3.87778 12.1223 3.54199 11.7081 3.54199H9.29142C8.87721 3.54199 8.54142 3.87778 8.54142 4.29199V4.54199ZM8.8335 8.50033C9.24771 8.50033 9.5835 8.83611 9.5835 9.25033V14.2503C9.5835 14.6645 9.24771 15.0003 8.8335 15.0003C8.41928 15.0003 8.0835 14.6645 8.0835 14.2503V9.25033C8.0835 8.83611 8.41928 8.50033 8.8335 8.50033ZM12.9168 9.25033C12.9168 8.83611 12.581 8.50033 12.1668 8.50033C11.7526 8.50033 11.4168 8.83611 11.4168 9.25033V14.2503C11.4168 14.6645 11.7526 15.0003 12.1668 15.0003C12.581 15.0003 12.9168 14.6645 12.9168 14.2503V9.25033Z" fill=""></path>
                </svg>
              </button>
            </div>
            </div>
  
        
        <!-- table body end -->
      </div>
    </div>
  </div>

@endsection

@push('scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script defer>
  function mahasiswaData() {
    return {
        mahasiswa: [],
        searchMhs: '',
        openDropDownFilter: false,
        selectedFilter: '',

        url: '/mhs/all',

        nim: "",
        nama_lengkap: "",
        selectedJurusan: "",
        tempat_lahir: "",
        tanggal_lahir: "",
        selectedProvinsi: '',
        selectedKota: '',
        selectedKecamatan: '',
        selectedKelurahan: '',
        alamat: "",
        
        jurusan: [],
        provinsi: [],
        kota: [],
        kecamatan: [],
        kelurahan: [],

        apiUrl: 'https://www.emsifa.com/api-wilayah-indonesia/api',
        isModalCreateOpen: false,
        isModalEditOpen: false,
        isModalDeleteAlert: false,

        deleteId: null,

        async convertWilayah(type, id) {
            if (!id) return ""
            try {
                const response = await fetch(`${this.apiUrl}/${type}/${id}.json`)
                const data = await response.json()
                return data.name || ""
            } catch (error) {
                console.error(`Error fetching ${type} for ID ${id}:`, error)
                return ""
            }
        },

        async fetchData() {
            try {
                let queryParams = new URLSearchParams()
                if (this.searchMhs.trim() !== '') queryParams.append('search', this.searchMhs)
                if (this.selectedFilter.trim() !== '') queryParams.append('filter', this.selectedFilter)
                
                let fullUrl = this.url
                if (queryParams.toString()) fullUrl += '?' + queryParams.toString()
                
                const response = await fetch(fullUrl)
                const data = await response.json()
                
                this.mahasiswa = await Promise.all(data.data.map(async (mhs) => {
                    return {
                        ...mhs,
                        provinsi: await this.convertWilayah("province", mhs.id_provinsi),
                        kota: await this.convertWilayah("regency", mhs.id_kota),
                        kecamatan: await this.convertWilayah("district", mhs.id_kecamatan),
                        kelurahan: await this.convertWilayah("village", mhs.id_kelurahan),
                        alamat_lengkap: [
                            mhs.alamat,
                            await this.convertWilayah("village", mhs.id_kelurahan),
                            await this.convertWilayah("district", mhs.id_kecamatan),
                            await this.convertWilayah("regency", mhs.id_kota),
                            await this.convertWilayah("province", mhs.id_provinsi),
                        ].filter(nama => nama).join(', ')
                    }
                }))
            } catch (error) {
                console.error('Error fetching mahasiswa:', error)
            }
        },

        async init() {
            await this.fetchData()
            await this.loadJurusan()
            await this.loadProvinsi()

            this.$watch('searchMhs', () => {
              this.fetchData()
            })

            this.$watch('selectedFilter', () => {
              this.fetchData()
            })

            this.$watch('isModalEditOpen', (newValue) => {
                if (newValue === false) {
                    this.resetForm()
                }
            })
        },

        async loadJurusan() {
            try {
                const response = await fetch('/jurusan/all')
                const data = await response.json()
                this.jurusan = data.data
            } catch (error) {
                console.error('Error fetching jurusan:', error)
            }
        },

        async loadProvinsi() {
            try {
                const response = await fetch(`${this.apiUrl}/provinces.json`)
                this.provinsi = await response.json()
            } catch (error) {
                console.error('Error fetching provinces:', error)
            }
        },

        async loadKota() {
            if (!this.selectedProvinsi) return
            try {
                const response = await fetch(`${this.apiUrl}/regencies/${this.selectedProvinsi}.json`)
                this.kota = await response.json()
                this.kecamatan = []
                this.kelurahan = []
            } catch (error) {
                console.error('Error fetching regencies:', error)
            }
        },

        async loadKecamatan() {
            if (!this.selectedKota) return
            try {
                const response = await fetch(`${this.apiUrl}/districts/${this.selectedKota}.json`)
                this.kecamatan = await response.json()
                this.kelurahan = []
            } catch (error) {
                console.error('Error fetching districts:', error)
            }
        },

        async loadKelurahan() {
            if (!this.selectedKecamatan) return
            try {
                const response = await fetch(`${this.apiUrl}/villages/${this.selectedKecamatan}.json`)
                this.kelurahan = await response.json()
            } catch (error) {
                console.error('Error fetching villages:', error)
            }
        },

        async storeData() {
            try {
                let formData = new FormData()
                formData.append("nim", this.nim)
                formData.append("nama_lengkap", this.nama_lengkap)
                formData.append("jurusan", this.selectedJurusan)
                formData.append("tempat_lahir", this.tempat_lahir)
                formData.append("tanggal_lahir", this.tanggal_lahir)
                formData.append("id_provinsi", this.selectedProvinsi)
                formData.append("id_kota", this.selectedKota)
                formData.append("id_kecamatan", this.selectedKecamatan)
                formData.append("id_kelurahan", this.selectedKelurahan)
                formData.append("alamat", this.alamat)

                const response = await fetch("{{ route('mhs.store') }}", {
                    method: "POST",
                    headers: { "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content },
                    body: formData,
                })

                const data = await response.json()
                if (response.ok) {
                    alert("Mahasiswa berhasil ditambahkan!")
                  } else {
                    alert("Gagal menambahkan mahasiswa!")
                  }
            } catch (error) {
                console.error("Error storing data:", error)
                alert("Terjadi kesalahan!")
            }
            this.isModalCreateOpen = false
            this.resetForm() 

            await this.fetchData()
        },

        async loadEditUser(mhs) {
          this.nim = mhs.nim
          this.nama_lengkap = mhs.nama_lengkap
          this.selectedJurusan = mhs.jurusan.kode_jurusan
          this.tempat_lahir = mhs.tempat_lahir
          this.tanggal_lahir = mhs.tanggal_lahir
          await this.loadProvinsi()
          this.selectedProvinsi = mhs.id_provinsi
          await this.loadKota()
          this.selectedKota = mhs.id_kota
          await this.loadKecamatan()
          this.selectedKecamatan = mhs.id_kecamatan
          await this.loadKelurahan()
          this.selectedKelurahan = mhs.id_kelurahan
          this.alamat = mhs.alamat

          this.isModalEditOpen = true
        },

        async editData() {
            try {
                let formData = new FormData()
                formData.append("nama_lengkap", this.nama_lengkap)
                formData.append("jurusan", this.selectedJurusan)
                formData.append("tempat_lahir", this.tempat_lahir)
                formData.append("tanggal_lahir", this.tanggal_lahir)
                formData.append("id_provinsi", this.selectedProvinsi)
                formData.append("id_kota", this.selectedKota)
                formData.append("id_kecamatan", this.selectedKecamatan)
                formData.append("id_kelurahan", this.selectedKelurahan)
                formData.append("alamat", this.alamat)

                formData.append("_method", "PUT")
                const response = await fetch(`/mhs/edit/${this.nim}`, {
                    method: "POST",
                    headers: { "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content },
                    body: formData,
                })

                const data = await response.json()
                if (response.ok) {
                    alert("Data Mahasiswa berhasil diubah!")
                  } else {
                    alert("Gagal mengubah data mahasiswa!")
                  }
            } catch (error) {
                console.error("Error storing data:", error)
                alert("Terjadi kesalahan!")
            } finally {
              this.isModalEditOpen = false
              this.resetForm() 
              await this.fetchData()
            }

        },

        confirmDelete(id) {
            this.deleteId = id
            this.isModalDeleteAlert = true
        },

        async deleteData() {
            if (!this.deleteId) return

            try {
                let formData = new FormData()
                formData.append("_method", "PUT")
                let response = await fetch(`/mhs/delete/${this.deleteId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        body: formData,
                    }
                })

                if (response.ok) {
                    alert('Data berhasil dihapus!')
                } else {
                    alert('Gagal menghapus data.')
                }
            } catch (error) {
                console.error('Error:', error)
                alert('Terjadi kesalahan.')
            } finally {
                this.isModalDeleteAlert = false
                this.deleteId = null
                await this.fetchData()
            }
        },

        resetForm() {
            this.nim = ""
            this.nama_lengkap = ""
            this.selectedJurusan = ""
            this.tempat_lahir = ""
            this.tanggal_lahir = ""
            this.selectedProvinsi = ""
            this.selectedKota = ""
            this.selectedKecamatan = ""
            this.selectedKelurahan = ""
            this.alamat = ""
        }

    }
}

</script>
@endpush