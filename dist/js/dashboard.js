document.getElementById("jumlah_dokumen").innerHTML = berkas.length;
document.getElementById("jumlah_pengguna").innerHTML = pengguna.length;
let data = [];
for (let index = 0; index < dataPerBulan.length; index++) {
    data.push(dataPerBulan[index].jumlah);
}
var _ctx5 = cash('#grafik_jumlah_dokumen')[0].getContext('2d');
// Grafik jumlah dokumen
// data dokumen per bulan

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

var DokumenPerDivisi = cash('#grafik_jumlah_dokumen_per_divisi')[0].getContext('2d');
// Grafik jumlah dokumen
// data dokumen per bulan
let jumlahDokumen = [];
let divisi = [];
for (let index = 0; index < dataPerDivisi.length; index++) {
    jumlahDokumen.push(dataPerDivisi[index].jumlahdokumen);
    divisi.push(dataPerDivisi[index].divisi);
}
var grafikDokumenPerDivisi = new Chart(DokumenPerDivisi, {
    type: 'bar',
    data: {
        labels: divisi,
        datasets: [{
            label: 'Jumlah Dokumen',
            barPercentage: 0.5,
            barThickness: 15,
            maxBarThickness: 20,
            minBarLength: 2,
            data: jumlahDokumen,
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