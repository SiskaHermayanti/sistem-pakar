<!-- print_result.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosis</title>
    <!-- Tambahkan stylesheet atau gaya sesuai kebutuhan -->
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>
    <div class="container mx-auto py-10 md:w-4/5 w-11/12 px-6">
        <h2 class="text-2xl font-bold text-sky-700 mb-6">Hasil Diagnosis</h2>
        
        <div class="flex flex-col md:flex-row items-center space-x-4 mt-4">
            <div class="md:w-1/2">
                <p class="mb-2 text-lg">Penyakit Kulit yang di Derita adalah:</p>
                <!-- Tampilkan hasil diagnosis dari variabel PHP -->
                <p class="font-semibold text-2xl text-sky-900 mb-4"><?= $penyakit ?>, disarankan Konsultasi Langsung dengan Dokter.</p>

                <p class="mb-2 text-lg">Deskripsi Penyakit:</p>
                <!-- Tampilkan hasil diagnosis dari variabel PHP -->
                <p class="font-semibold text-2xl text-sky-900 mb-4"><?= $deskripsi_penyakit ?>, disarankan Konsultasi Langsung dengan Dokter.</p>
                
                <p class="mb-2 text-lg">Solusi Pengobatan:</p>
                <!-- Tampilkan solusi pengobatan dari variabel PHP -->
                <p class="font-semibold text-lg"><?= $solusi ?>, disarankan Konsultasi Langsung dengan Dokter.</p>
            </div>
        </div>
    </div>
</body>
</html>
