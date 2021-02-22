document.getElementById("jumlah_dokumen").innerHTML = berkas.length;
document.getElementById("jumlah_pengguna").innerHTML = pengguna.length;
let data = [];
for (let index = 0; index < dataPerBulan.length; index++) {
      console.log(dataPerBulan[index].jumlah);
      data.push(dataPerBulan[index].jumlah);
}
var _ctx5 = cash('#grafik_jumlah_dokumen')[0].getContext('2d');
var _myChart = new Chart(_ctx5, {
    type: 'bar',
    data: {
        labels: ['2019', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des', '2021'],
        datasets: [{
            label: 'Jumlah Dokumen',
            barPercentage: 0.5,
            barThickness: 15,
            maxBarThickness: 20,
            minBarLength: 2,
            data: data,
            backgroundColor: '#3160D8'
        }]
    },
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    fontSize: '12',
                    fontColor: '#777777'
                },
                gridLines: {
                    display: false
                }
            }],
            yAxes: [{
                ticks: {
                    fontSize: '12',
                    fontColor: '#777777',
                    callback: function callback(value, index, values) {
                        return value;
                    }
                },
                gridLines: {
                    color: '#D8D8D8',
                    zeroLineColor: '#D8D8D8',
                    borderDash: [2, 2],
                    zeroLineBorderDash: [2, 2],
                    drawBorder: false
                }
            }]
        }
    }
});

var grafikDokumenPerDivisi = cash('#grafik_jumlah_dokumen_per_divisi')[0].getContext('2d');
var _myChart = new Chart(grafikDokumenPerDivisi, {
    type: 'bar',
    data: {
        labels: [
            '-',
            'Divisi Akuntansi',
            'Divisi Kapal Niaga',
            'Divisi Kapal Perang',
            'Divisi Kapal Selam',
            'Divisi Pemasaran dan Penjualan',
            'Divisi Rekayasa Umum',
            'Divisi Pemeliharaan dan Perbaikan',
            'Divisi Penjualan Rekumhar',
            'Divisi Jaminan Kualitas',
            'Divisi Supply Chain',
            'Divisi Perbendaharaan',
            'Divisi Akuntansi',
            'Divisi Teknologi Informasi',
            'Divisi HCM and Command Media',
            'Guest',
            'Sekretaris Perusahaan',
            'Satuan Pengawasan Intern',
            'Perencanaan Strategis Perusahaan',
            'Keamanan dan K3LH',
            'Technology, Design, and Naval System',
            '-'
        ],
        datasets: [{
            label: 'Jumlah Dokumen',
            barPercentage: 0.5,
            barThickness: 10,
            maxBarThickness: 8,
            minBarLength: 2,
            data: data,
            backgroundColor: '#3160D8'
        }]
    },
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    fontSize: '12',
                    fontColor: '#777777'
                },
                gridLines: {
                    display: false
                }
            }],
            yAxes: [{
                ticks: {
                    fontSize: '12',
                    fontColor: '#777777',
                    callback: function callback(value, index, values) {
                        return value;
                    }
                },
                gridLines: {
                    color: '#D8D8D8',
                    zeroLineColor: '#D8D8D8',
                    borderDash: [2, 2],
                    zeroLineBorderDash: [2, 2],
                    drawBorder: false
                }
            }]
        }
    }
});
