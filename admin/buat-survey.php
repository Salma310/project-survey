
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Survey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div style="position:relative; right:117px; top:40px;">
            <button class="ms-2" style="border: none; background-color: transparent; width: 35px;" onclick="window.history.back()">
                <i class="lni lni-arrow-left pt-1 fs-4"></i>
            </button>
        </div>
        
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Buat Survey</h4>
            </div>
            <div class="card-body">
                <form id="surveyForm">
                    <div class="mb-3">
                        <label for="survey_jenis" class="form-label">Jenis Survey</label>
                        <select class="form-select" id="survey_jenis" required>
                            <option disabled selected>Pilih jenis survey</option>
                            <option value="kualitas">Kualitas</option>
                            <option value="fasilitas">Fasilitas</option>
                            <option value="pelayanan">Pelayanan</option>
                            <option value="lulusan">Lulusan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="responden_id" class="form-label">Responden</label>
                        <select class="form-select" id="survey_jenis" required>
                            <option disabled selected>Pilih responden survey</option>
                            <option value="1">Mahasiswa</option>
                            <option value="2">Dosen</option>
                            <option value="3">Alumni</option>
                            <option value="4">Wali Mahasiswa</option>
                            <option value="5">Industri</option>
                            <option value="6">Tenaga Kependidikan</option>
                        </select>
                    </div>
                     <div class="mb-3">
                        <label for="survey_judul" class="form-label">Judul Survey</label>
                        <input type="text" class="form-control" id="survey_judul" placeholder="Masukkan judul survey" required>
                    </div>
                    <div class="mb-3">
                        <label for="survey_kode" class="form-label">Kode Survey</label>
                        <input type="text" class="form-control" id="survey_kode" placeholder="Masukkan kode survey" required>
                    </div>
                    <div class="mb-3">
                        <label for="survey_deskripsi" class="form-label">Deskripsi Survey</label>
                        <textarea class="form-control" id="survey_deskripsi" rows="3" placeholder="Masukkan deskripsi survey"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="background_pic" class="form-label">Gambar Background Survey</label>
                        <input type="file" name="fileUpload" id="fileUpload" accept="image/*" required>
                        <!-- <textarea class="form-control" id="background_pic" rows="3" placeholder="Masukkan deskripsi survey"></textarea> -->
                    </div>
                    
                    <div id="questionsContainer">
                        <div class="card question-card">
                            <div class="card-header bg-light">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Pertanyaan 1</span>
                                    <button type="button" class="btn-close" aria-label="Close" onclick="removeQuestion(this)"></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Pertanyaan</label>
                                    <input type="text" class="form-control" placeholder="Masukkan pertanyaan" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Pertanyaan</label>
                                    <select class="form-select" onchange="questionTypeChanged(this)">
                                        <!-- <option value="text">Teks</option> -->
                                        <option value="multipleChoice" selected>Pilihan Ganda</option>
                                    </select>
                                </div>
                                <div class="options-container mb-3">
                                    <label class="form-label">Opsi Jawaban</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Sangat Buruk">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Buruk">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Cukup">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Baik">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Sangat Baik">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <button type="button" class="btn btn-secondary" onclick="addOption(this)">Tambah Opsi</button>
                                </div>
                            </div>
                        </div>
                        <div class="card question-card">
                            <div class="card-header bg-light">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Pertanyaan 2</span>
                                    <button type="button" class="btn-close" aria-label="Close" onclick="removeQuestion(this)"></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Pertanyaan</label>
                                    <input type="text" class="form-control" placeholder="Masukkan pertanyaan" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Pertanyaan</label>
                                    <select class="form-select" onchange="questionTypeChanged(this)">
                                        <!-- <option value="text">Teks</option> -->
                                        <option value="multipleChoice" selected>Pilihan Ganda</option>
                                    </select>
                                </div>
                                <div class="options-container mb-3">
                                    <label class="form-label">Opsi Jawaban</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Sangat Buruk">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Buruk">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Cukup">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Baik">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Sangat Baik">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <button type="button" class="btn btn-secondary" onclick="addOption(this)">Tambah Opsi</button>
                                </div>
                            </div>
                        </div>
                        <div class="card question-card">
                            <div class="card-header bg-light">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Pertanyaan 3</span>
                                    <button type="button" class="btn-close" aria-label="Close" onclick="removeQuestion(this)"></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Pertanyaan</label>
                                    <input type="text" class="form-control" placeholder="Masukkan pertanyaan" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Pertanyaan</label>
                                    <select class="form-select" onchange="questionTypeChanged(this)">
                                        <!-- <option value="text">Teks</option> -->
                                        <option value="multipleChoice" selected>Pilihan Ganda</option>
                                    </select>
                                </div>
                                <div class="options-container mb-3">
                                    <label class="form-label">Opsi Jawaban</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Sangat Buruk">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Buruk">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Cukup">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Baik">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Sangat Baik">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <button type="button" class="btn btn-secondary" onclick="addOption(this)">Tambah Opsi</button>
                                </div>
                            </div>
                        </div>
                        <div class="card question-card">
                            <div class="card-header bg-light">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Pertanyaan 4</span>
                                    <button type="button" class="btn-close" aria-label="Close" onclick="removeQuestion(this)"></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Pertanyaan</label>
                                    <input type="text" class="form-control" placeholder="Masukkan pertanyaan" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Pertanyaan</label>
                                    <select class="form-select" onchange="questionTypeChanged(this)">
                                        <!-- <option value="text">Teks</option> -->
                                        <option value="multipleChoice" selected>Pilihan Ganda</option>
                                    </select>
                                </div>
                                <div class="options-container mb-3">
                                    <label class="form-label">Opsi Jawaban</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Sangat Buruk">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Buruk">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Cukup">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Baik">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Sangat Baik">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <button type="button" class="btn btn-secondary" onclick="addOption(this)">Tambah Opsi</button>
                                </div>
                            </div>
                        </div>
                        <div class="card question-card">
                            <div class="card-header bg-light">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Pertanyaan 5</span>
                                    <button type="button" class="btn-close" aria-label="Close" onclick="removeQuestion(this)"></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Pertanyaan</label>
                                    <input type="text" class="form-control" placeholder="Masukkan pertanyaan" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Pertanyaan</label>
                                    <select class="form-select" onchange="questionTypeChanged(this)">
                                        <!-- <option value="text">Teks</option> -->
                                        <option value="multipleChoice" selected>Pilihan Ganda</option>
                                    </select>
                                </div>
                                <div class="options-container mb-3">
                                    <label class="form-label">Opsi Jawaban</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Sangat Buruk">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Buruk">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Cukup">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Baik">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban" value="Sangat Baik">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <button type="button" class="btn btn-secondary" onclick="addOption(this)">Tambah Opsi</button>
                                </div>
                            </div>
                        </div>
                        <div class="card question-card">
                            <div class="card-header bg-light">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Pertanyaan 6</span>
                                    <button type="button" class="btn-close" aria-label="Close" onclick="removeQuestion(this)"></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Pertanyaan</label>
                                    <input type="text" class="form-control" placeholder="Masukkan pertanyaan" value="Saran, Tanggapan, dan Kritik">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Pertanyaan</label>
                                    <select class="form-select" onchange="questionTypeChanged(this)">
                                        <!-- <option value="text" selected>Teks</option> -->
                                        <option value="multipleChoice">Pilihan Ganda</option>
                                    </select>
                                </div>
                                <div class="options-container mb-3" style="display: none;">
                                    <label class="form-label">Opsi Jawaban</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan opsi jawaban">
                                        <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                                    </div>
                                    <button type="button" class="btn btn-secondary" onclick="addOption(this)">Tambah Opsi</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <button type="button" class="btn btn-primary" onclick="addQuestion()">Tambah Pertanyaan</button>
                    <button type="submit" class="btn btn-success">Simpan Survei</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let questionCount = 6;

        function addQuestion() {
            questionCount++;
            const questionCard = document.createElement('div');
            questionCard.className = 'card question-card';
            questionCard.innerHTML = `
                <div class="card-header bg-light">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Pertanyaan ${questionCount}</span>
                        <button type="button" class="btn-close" aria-label="Close" onclick="removeQuestion(this)"></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control" placeholder="Masukkan pertanyaan" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Pertanyaan</label>
                        <select class="form-select" onchange="questionTypeChanged(this)">
                            <option value="text">Teks</option>
                            <option value="multipleChoice">Pilihan Ganda</option>
                        </select>
                    </div>
                    <div class="options-container mb-3" style="display: none;">
                        <label class="form-label">Opsi Jawaban</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Masukkan opsi jawaban">
                            <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
                        </div>
                        <button type="button" class="btn btn-secondary" onclick="addOption(this)">Tambah Opsi</button>
                    </div>
                </div>
            `;
            document.getElementById('questionsContainer').appendChild(questionCard);
        }

        function removeQuestion(button) {
            button.closest('.question-card').remove();
        }

        function questionTypeChanged(select) {
            const optionsContainer = select.closest('.card-body').querySelector('.options-container');
            if (select.value === 'multipleChoice') {
                optionsContainer.style.display = 'block';
            } else {
                optionsContainer.style.display = 'none';
            }
        }

        function addOption(button) {
            const optionsContainer = button.closest('.options-container');
            const newOption = document.createElement('div');
            newOption.className = 'input-group mb-2';
            newOption.innerHTML = `
                <input type="text" class="form-control" placeholder="Masukkan opsi jawaban">
                <button class="btn btn-outline-secondary" type="button" onclick="removeOption(this)">Hapus</button>
            `;
            optionsContainer.insertBefore(newOption, button);
        }

        function removeOption(button) {
            button.closest('.input-group').remove();
        }

        document.getElementById('surveyForm').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Survei berhasil disimpan!');
        });
    </script>
</body>

</html>
