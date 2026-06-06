</div>
</div>
</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js');?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js');?>"></script>

<script>



    $(document).ready(function(){
        $('#dataTable').DataTable({
            "language": {
                "search": "Cari:",
                "lengtMenu": "Tampilan_MENU_data",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "paginate":{
                    "previous": "Sebelumnya",
                    "next": "Berikutnya"
                }
            }
        });
    });
</script>
<script>
    var ctx = document.getElementById("chartDashboard");
    var chart = new Chart(ctx,{
        type: 'bar',
        data:{
            labels: ['Kategori', 'Buku', 'Anggota'],
            datasets:[{
                labels:'Jumlah Data',
                data:[
                    <?= $total_kategori; ?>,
                    <?= $total_buku; ?>,
                    <?= $total_anggota; ?>
                ],
                backgroundColor:[
                    '#e9b0d1',
                    '#1cc88a',
                    '#aa1e36'
                ]
            }]
        },
        options:{
            responsive: true,
            scales:{
                yAxes:[{
                    ticks:{
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
</body>
</html>