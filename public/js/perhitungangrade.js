// mengambil nilai dari form input
const quiz = document.getElementById('quiz').value;
const tugas = document.getElementById('tugas').value;
const absensi = document.getElementById('absensi').value;
const praktek = document.getElementById('praktek').value;
const uas = document.getElementById('uas').value;

// menghitung nilai akhir
const nilaiAkhir = (quiz * 0.1) + (tugas * 0.2) + (absensi * 0.1) + (praktek * 0.3) + (uas * 0.3);

// menampilkan nilai akhir
document.getElementById('nilai-akhir').innerHTML = nilaiAkhir;

// menentukan grade
let grade;
if (nilaiAkhir <= 65) {
  grade = 'D';
} else if (nilaiAkhir <= 75) {
  grade = 'C';
} else if (nilaiAkhir <= 85) {
  grade = 'B';
} else if (nilaiAkhir <= 100) {
  grade = 'A';
} else {
  grade = 'Nilai tidak valid';
}

// menampilkan grade
document.getElementById('grade').innerHTML = grade;

// membuat objek FormData untuk mengirim data ke Laravel
const formData = new FormData();
formData.append('quiz', quiz);
formData.append('tugas', tugas);
formData.append('absensi', absensi);
formData.append('praktek', praktek);
formData.append('uas', uas);
formData.append('grade', grade);

// mengirim data ke Laravel menggunakan Ajax
const xhr = new XMLHttpRequest();
xhr.open('POST', '{{ route("input") }}');
xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
xhr.onload = function () {
  if (xhr.status === 200 && xhr.responseText === 'success') {
    alert('Data berhasil disimpan!');
  } else {
    alert('Terjadi kesalahan saat menyimpan data!');
  }
};
xhr.send(formData);
