<div x-show="isModalCreateOpen" class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999" style="display: none;">
    <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
    <div @click.outside="isModalCreateOpen = false" class="relative w-full max-w-[584px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
      <!-- close btn -->
      <button @click="isModalCreateOpen = false" class="group absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-200 text-gray-500 transition-colors hover:bg-gray-300 hover:text-gray-500 dark:bg-gray-800 dark:hover:bg-gray-700 sm:right-6 sm:top-6 sm:h-11 sm:w-11">
        <svg class="transition-colors fill-current group-hover:text-gray-600 dark:group-hover:text-gray-200" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z" fill=""></path>
        </svg>
      </button>

      <form @submit.prevent="storeData" method="post">
          @csrf
        <h4 class="mb-6 text-lg font-medium text-gray-800 dark:text-white/90">
          Tambah Data Mahasiswa
        </h4>

        <div class="grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2">
          <div class="col-span-1">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              NIM
            </label>
            <input type="text" name="nim" x-model="nim" placeholder="Wafiq" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
          </div>

          <div class="col-span-1">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              Nama Lengkap
            </label>
            <input type="text" name="nama_lengkap" x-model="nama_lengkap" placeholder="Chowdhury" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
          </div>

          <div class="col-span-2">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              Jurusan
            </label>
            <select name="jurusan" x-model="selectedJurusan" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
              <option value="" disabled>--- Pilih Jurusan ---</option>
              <template x-for="j in jurusan" :key="j.kode_jurusan">
                  <option :value="j.kode_jurusan" x-text="j.nama_jurusan"></option>
              </template>
              </template>
            </select>
          </div>

          <div class="col-span-1">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              Tempat Lahir
            </label>
            <input type="text" name="tempat_lahir" x-model="tempat_lahir" placeholder="Semarang" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
          </div>

          <div class="col-span-1">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Tanggal Lahir
              </label>
              <input type="date" name="tanggal_lahir" x-model="tanggal_lahir" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
          </div>

          <div class="col-span-1">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Provinsi
              </label>
              <select name="id_provinsi" x-model="selectedProvinsi" x-on:change="loadKota" x-init="loadProvinsi()" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                  <option value="" disabled>--- Pilih Provinsi ---</option>
                  <template x-for="prov in provinsi" :key="prov.id">
                      <option :value="prov.id" x-text="prov.name"></option>
                  </template>
              </select>    
          </div>

          <div class="col-span-1">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400" >
                Kabupaten/Kota
              </label>
              <select name="id_kota" x-model="selectedKota" x-on:change="loadKecamatan" :disabled="!selectedProvinsi" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                  <option value="" disabled>--- Pilih Kota ---</option>
                  <template x-for="kot in kota" :key="kot.id">
                      <option :value="kot.id" x-text="kot.name"></option>
                  </template>
              </select>    
          </div>

          <div class="col-span-1">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Kecamatan
              </label>
              <select name="id_kecamatan" x-model="selectedKecamatan" x-on:change="loadKelurahan" :disabled="!selectedKota" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                  <option value="" disabled>--- Pilih Kecamatan ---</option>
                  <template x-for="kec in kecamatan" :key="kec.id">
                      <option :value="kec.id" x-text="kec.name"></option>
                  </template>
              </select>    
          </div>
          <div class="col-span-1">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Kelurahan
              </label>
              <select name="id_kelurahan" x-model="selectedKelurahan" x-on:change="" :disabled="!selectedKecamatan" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                  <option value="" disabled>--- Pilih Kelurahan ---</option>
                  <template x-for="kel in kelurahan" :key="kel.id">
                      <option :value="kel.id" x-text="kel.name"></option>
                  </template>
              </select>    
          </div>
          <div class="col-span-2">
            <input type="text" name="alamat"  x-model="alamat" placeholder="Jl. No x / RT RW" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
        </div>
        </div>

        <div class="flex items-center justify-end w-full gap-3 mt-6">
          <button @click="isModalCreateOpen = false" type="button" class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs transition-colors hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:w-auto">
            Close
          </button>
          <button type="submit" class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600 sm:w-auto">
            Create
          </button>
        </div>
      </form>
    </div>
</div>



<div x-show="isModalEditOpen" class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999" style="display: none;">
  <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
  <div @click.outside="isModalEditOpen = false" class="relative w-full max-w-[584px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
    <!-- close btn -->
    <button @click="isModalEditOpen = false" class="group absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-200 text-gray-500 transition-colors hover:bg-gray-300 hover:text-gray-500 dark:bg-gray-800 dark:hover:bg-gray-700 sm:right-6 sm:top-6 sm:h-11 sm:w-11">
      <svg class="transition-colors fill-current group-hover:text-gray-600 dark:group-hover:text-gray-200" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z" fill=""></path>
      </svg>
    </button>

    <form @submit.prevent="editData">
    <h4 class="mb-6 text-lg font-medium text-gray-800 dark:text-white/90">
      Edit Data Mahasiswa
    </h4>

    <div class="grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2">
      <div class="col-span-1">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
          NIM
        </label>
        <input type="text" name="nim" x-model="nim" placeholder="Wafiq" class=" disabled:bg-gray-50 dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" disabled>
      </div>

      <div class="col-span-1">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
          Nama Lengkap
        </label>
        <input type="text" name="nama_lengkap" x-model="nama_lengkap" placeholder="Chowdhury" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
      </div>

      <div class="col-span-2">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
          Jurusan
        </label>
        <select name="jurusan" x-model="selectedJurusan" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
          <option value="" disabled>--- Pilih Jurusan ---</option>
          <template x-for="j in jurusan" :key="j.kode_jurusan">
              <option :value="j.kode_jurusan" x-text="j.nama_jurusan"></option>
          </template>
          </template>
        </select>
      </div>

      <div class="col-span-1">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
          Tempat Lahir
        </label>
        <input type="text" name="tempat_lahir" x-model="tempat_lahir" placeholder="Semarang" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
      </div>

      <div class="col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Tanggal Lahir
          </label>
          <input type="date" name="tanggal_lahir" x-model="tanggal_lahir" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
      </div>

      <div class="col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Provinsi
          </label>
          <select name="id_provinsi" x-model="selectedProvinsi" x-on:change="loadKota" x-init="loadProvinsi()" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
              <option value="" disabled>--- Pilih Provinsi ---</option>
              <template x-for="prov in provinsi" :key="prov.id">
                  <option :value="prov.id" x-text="prov.name"></option>
              </template>
          </select>    
      </div>

      <div class="col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400" >
            Kabupaten/Kota
          </label>
          <select name="id_kota" x-model="selectedKota" x-on:change="loadKecamatan" :disabled="!selectedProvinsi" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
              <option value="" disabled>--- Pilih Kota ---</option>
              <template x-for="kot in kota" :key="kot.id">
                  <option :value="kot.id" x-text="kot.name"></option>
              </template>
          </select>    
      </div>

      <div class="col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Kecamatan
          </label>
          <select name="id_kecamatan" x-model="selectedKecamatan" x-on:change="loadKelurahan" :disabled="!selectedKota" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
              <option value="" disabled>--- Pilih Kecamatan ---</option>
              <template x-for="kec in kecamatan" :key="kec.id">
                  <option :value="kec.id" x-text="kec.name"></option>
              </template>
          </select>    
      </div>
      <div class="col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Kelurahan
          </label>
          <select name="id_kelurahan" x-model="selectedKelurahan" x-on:change="" :disabled="!selectedKecamatan" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
              <option value="" disabled>--- Pilih Kelurahan ---</option>
              <template x-for="kel in kelurahan" :key="kel.id">
                  <option :value="kel.id" x-text="kel.name"></option>
              </template>
          </select>    
      </div>
      <div class="col-span-2">
        <input type="text" name="alamat"  x-model="alamat" placeholder="Jl. No x / RT RW" class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
    </div>
    </div>

    <div class="flex items-center justify-end w-full gap-3 mt-6">
      <button @click="isModalEditOpen = false" type="button" class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs transition-colors hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:w-auto">
        Close
      </button>
      <button type="submit" class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600 sm:w-auto">
        Save
      </button>
    </div>
  </form>
</div>
</div>

<div x-show="isModalDeleteAlert" class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999">
  <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
  <div class="flex flex-col px-4 py-4 overflow-y-auto no-scrollbar">
      <div @click.outside="isModalDeleteAlert = false" class="relative w-full max-w-[507px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
          <div class="text-center">
              <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90 sm:text-title-sm">
                  Are you sure you want to delete this data?
              </h4>

              <div class="flex items-center justify-center w-full gap-3 mt-8">
                  <button @click="isModalDeleteAlert = false" type="button" class="flex justify-center rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                      Cancel
                  </button>
                  <button @click="deleteData()" type="button" class="flex justify-center px-4 py-3 text-sm font-medium text-white rounded-lg bg-red-500 shadow-theme-xs hover:bg-red-600">
                      Delete
                  </button>
              </div>
          </div>
      </div>
  </div>
</div>
