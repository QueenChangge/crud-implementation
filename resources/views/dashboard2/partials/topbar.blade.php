<!-- TOPBAR -->
<div class="w-full xl:h-36 md:32 xs:24 bg-white flex items-center justify-between xl:py-10 md:py-8 xs:py-6">
    <!-- LEFT TOPBAR -->
    <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none" class="xs:block md:hidden xl:hidden">
        <path d="M8.43762 13.5H45.5626M8.43762 27H45.5626M8.43762 40.5H45.5626" stroke="#3E3E3E" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    <div class="border-2 border-disabled xl:w-80 md:w-70 xs:w-60 h-12 rounded-4xl flex items-center px-2 gap-2 py-4 xl:flex md:flex xs:hidden">
        <div class="w-6 h-6 bg-purple rounded-full"></div>
        <p class="text-lg font-light">Search</p>
    </div>
    <!-- RIGHT TOPBAR -->
    <div class="flex gap-10">
        <div class="bg-purple w-fit-content h-12 rounded-4xl flex items-center px-6 gap-2  md:hidden xl:flex xs:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                <path d="M15.9062 24.9688V19.5312H19.5312L15 14.0938L10.4688 19.5312H14.0938V24.9688H9.5625V24.9234C9.41025 24.9325 9.26525 24.9688 9.10938 24.9688C7.30673 24.9688 5.57792 24.2527 4.30326 22.978C3.0286 21.7033 2.3125 19.9745 2.3125 18.1719C2.3125 14.6846 4.94969 11.8426 8.33362 11.4529C8.63032 9.90197 9.45819 8.50287 10.6749 7.49626C11.8915 6.48966 13.4209 5.93847 15 5.9375C16.5793 5.93837 18.109 6.48949 19.3259 7.49607C20.5429 8.50266 21.3711 9.90181 21.6682 11.4529C25.0521 11.8426 27.6857 14.6846 27.6857 18.1719C27.6857 19.9745 26.9696 21.7033 25.6949 22.978C24.4203 24.2527 22.6915 24.9688 20.8888 24.9688C20.7366 24.9688 20.5897 24.9325 20.4357 24.9234V24.9688H15.9062Z" fill="white"/>
              </svg>
            <p class="text-lg text-white">Upload</p>
        </div>
        <div class="flex w-full h-12 flex gap-2 items-center">
            <div class="w-8 h-8 bg-purple rounded-full"></div>
            <p class="text-lg md:block xl:block xs:hidden">{{ Auth::user()->username }}</p>
        </div>
    </div>
</div>