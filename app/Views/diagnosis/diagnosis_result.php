<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>@import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css');</style>
    <title>Hasil Diagnosis</title>
</head>
<body>
<div class="w-full h-full">
        <dh-component>
            <div class="flex flex-no-wrap">
                <!-- Sidebar starts -->
                <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
                <div style="min-height: 100vh; position: fixed" class="w-64 absolute sm:relative bg-sky-950 shadow md:h-full flex-col justify-between hidden sm:flex">
                    <div class="px-8">
                        <div class="h-16 w-full flex items-center">
                            <div class="flex items-center justify-start mt-6">
                                <img src="<?php echo base_url('assets/logo.png')?>" class="h-12" alt="Medical Logo" />
                                <span class="self-center text-xl font-bold sm:text-2xl text-white whitespace-nowrap dark:text-white">Diag<span class="text-sky-300 italic">Skin</span></span>
                            </div>
                         
                        </div>
                        <ul class="mt-12">
                            <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                <a href="<?= site_url('admin/index') ?>" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6" />
                                </svg>

                                    <span class="text-sm ml-2">Gejala</span>
                                </a>
                            </li>
                            <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                <a href="<?= site_url('penyakit/index') ?>" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>

                                    <span class="text-sm ml-2">Penyakit</span>
                                </a>
                            </li>
                            <!-- <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                <a href="#" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                    </svg>
                                    <span class="text-sm ml-2">Relasi Gejala-Penyakit</span>
                                </a>
                            </li> -->
                            
                            <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                <a href="<?= site_url('solusi/index') ?>" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                                </svg>

                                    <span class="text-sm ml-2">Solusi Pengobatan</span>
                                </a>
                            </li>
                            <li class="flex w-full justify-between text-gray-100 cursor-pointer items-center mb-6">
                                <a href="<?= site_url('diagnosis/index') ?>" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                                    <span class="text-sm ml-2">Diagnosis</span>
                                </a>
                            </li>
                        </ul>        
                    </div>
                </div>
                <!-- Sidebar ends -->
                <!-- Remove class [ h-64 ] when adding a card block -->
                <div class="container mx-auto py-10 h-64 md:w-4/5 w-11/12 px-6 mr-6">
                    <h2 class="text-xl font-bold text-sky-700 mb-4">Hasil Diagnosis</h2>
                    
                    <div class="flex flex-col md:flex-row items-center space-x-2 mt-2 mb-6">
                        <div class="md:w-1/2">
                            <p class="mb-2">Penyakit kulit yang diderita adalah:</p>
                            <p class="font-bold mb-4"><?= $penyakit ?>, disarankan Konsultasi Langsung dengan Dokter.</p>

                            <p class="mb-2">Deskripsi Penyakit:</p>
                            <p class="font-bold mb-4"><?= $deskripsi_penyakit ?>, disarankan Konsultasi Langsung dengan Dokter.</p>
                            
                            <p class="mb-2">Solusi Pengobatan:</p>
                            <p class="font-bold"><?= $solusi ?>, disarankan Konsultasi Langsung dengan Dokter.</p>
                        </div>
                    </div>
                    
                    <!-- Tombol cetak ditempatkan di bawah -->
                    <div class="md:w-1/2 mt-4 md:mt-0">
                        <button onclick="printPage()" class="bg-sky-700 hover:bg-sky-500 text-gray-100 px-4 py-2 rounded text-sm transition duration-100">
                            Cetak
                        </button>
                    </div>
                </div>

                <script>
                    function printPage() {
                        // Buka halaman cetak dalam mode cetak
                        var printWindow = window.open('<?= base_url("CetakDiagnosis/print_result/$kode_penyakit") ?>', '_blank');

                        // Tunggu hingga halaman cetak dimuat, lalu munculkan dialog cetak
                        printWindow.onload = function () {
                            printWindow.print();
                        };
                    }
                </script>
            </div>   
        </dh-component>    
    </div>   

</body>
</html>
