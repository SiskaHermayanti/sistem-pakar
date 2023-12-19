<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>@import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css');</style>
    <title>Diagnosis Penyakit Kulit</title>

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
                            <li class="flex w-full justify-between text-gray-100 cursor-pointer items-center mb-6">
                                <a href="<?= site_url('diagnosis/index') ?>" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                                    <span class="text-sm ml-2">Diagnosis</span>
                                </a>
                            </li>
                            <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                <a href="#" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                </svg>
                                    <span class="text-sm ml-2">Log Out</span>
                                </a>
                            </li>
                        </ul>        
                    </div>
                </div>
                <!-- Sidebar ends -->
                <!-- Remove class [ h-64 ] when adding a card block -->
                <div class="container mx-auto py-10 h-64 md:w-4/5 w-11/12 px-6 mr-6">
                    <h2 class="text-xl font-bold text-sky-700">Pilih Gejala yang Anda Alami untuk Diagnosis</h2>
                <div class="flex items-center space-x-2 mt-2 mb-2">
                
                    <form action="<?= site_url('diagnosis/diagnose') ?>" method="post">

                        <?php foreach ($gejala as $key => $value) : ?>
                            <label for="<?= $value['kode_gejala'] ?>">
                                <input type="checkbox" name="<?= $value['kode_gejala'] ?>" value="1">
                                <?= $value['gejala'] ?>
                            </label><br>
                        <?php endforeach; ?>

                        <div class="mt-3">
                            <button type="submit" class="bg-sky-700 hover:bg-sky-500 text-gray-100 px-4 py-2 rounded text-sm transition duration-100">Diagnosa</button>
                        </div>
                    </div>
                    </form>
                    
                    </tbody>
                </table>
                </div>
        
                </div>
            </div>   
        </dh-component>    
    </div>   
    
</body>

</html>