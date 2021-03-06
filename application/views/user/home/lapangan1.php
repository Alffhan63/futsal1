<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
  <div class="clearfix" style="margin-top:30px;">
    <span class="clearfix">
      <center><h3 style="margin-bottom:40px;">List Tabel Booking Lapangan <?php echo $lapangan_book ?> </h3></center>
    </span>
  </div>
  <form action="<?php echo site_url('UserHome/lapangan/'.$no_lap)?>" method="post">
  <div class="form-group float-left">
    <div class='input-group date' id='datepicker'>
      <input id='gettanggal' type='text' class="form-control" name="tanggal"/>
      <button type="submit" class="btn btn-success" id="post" style="margin-left:30px;">Cari Jadwal</button>
      <!-- <a href="<?php echo site_url('UserHome/viewBooking/'.$no_lap)?>"
        class="btn btn-primary" style="margin-left:30px;">Booking</a> -->

      <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
    <!-- <button type="submit" class="btn btn-success" id="post">Cari Jadwal Berdasarkan tanggal</button> -->
    <!-- <h2>Jadwal Lapangan :  <h2 id="myP"></h2></h2> -->

    <a href="<?php echo site_url('UserHome/viewBooking/'.$no_lap)?>"
      class="btn btn-primary btn-block" style="margin-top:20px;">Booking</a>

  </div>
  </form>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Jam Mulai</th>
        <th>Status</th>
        <th>Nama Tim</th>
        <th>Tanggal Booking</th>
      </tr>
    </thead>
    <tbody>
    <?php $nomor = 1; ?>
      <?php foreach ($data as $book) { ?>

      <tr>
        <td>
          <?php echo $nomor; ?>
        </td>
        <!-- <td>
          <?php echo $book->tanggal_booking; ?>
        </td>  -->
        <td>
          <?php echo $book->jam_main; ?>
        </td>
        <!-- <td>
          <?php echo $book->nama_tim; ?>
        </td> -->
        <td>
          <?php foreach($Booking as $BookingLap){ ?>
          <!-- <?php echo $hasil= $book->id_jadwal; ?>
          <?php echo '<script>console.log('.json_encode($hasil).')</script>'; ?> -->
          <?php if ($BookingLap->id_jadwal == $book->id_jadwal): ?>
            <?php if ($BookingLap->status_booking == 0): ?>
            <p  style="color:#FF0000">Booking</p>
          <?php elseif ($BookingLap->status_booking == 1): ?>
            <p style="color:#008000">Booked</p>
            <?php else: ?>
              <p>Free</p>
            <?php endif; ?>
          <?php endif; ?>
          <?php }?>
        </td>
        <td>
          <?php foreach($Booking as $BookingLap){ ?>
          <!-- <?php echo $hasil= $book->id_jadwal; ?>
          <?php echo '<script>console.log('.json_encode($hasil).')</script>'; ?> -->
          <?php if ($BookingLap->id_jadwal == $book->id_jadwal):?>
            <?php if ($BookingLap->status_booking == 0): ?>
              <?php echo $BookingLap->nama_tim ?>
          <?php elseif ($BookingLap->status_booking == 1): ?>
            <?php echo $BookingLap->nama_tim ?>
            <?php else: ?>
              <p>Free</p>
            <?php endif; ?>
          <?php endif; ?>
          <?php }?>
        </td>
        <td>
          <?php foreach($Booking as $BookingLap){ ?>
          <!-- <?php echo $hasil= $book->id_jadwal; ?>
          <?php echo '<script>console.log('.json_encode($hasil).')</script>'; ?> -->
          <?php if ($BookingLap->id_jadwal == $book->id_jadwal):?>
            <?php if ($BookingLap->status_booking == 0): ?>
              <?php echo $BookingLap->tanggal_booking ?>
          <?php elseif ($BookingLap->status_booking == 1): ?>
            <?php echo $BookingLap->tanggal_booking ?>
            <?php else: ?>
              <p>Free</p>
            <?php endif; ?>
          <?php endif; ?>
          <?php }?>
        </td>
      </tr>
      <?php $nomor = $nomor + 1; ?>
      <?php }?>

    </tbody>
  </table>

<script type="text/javascript">
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })
</script>

<script>
var inp = document.getElementById('gettanggal');
var p = document.getElementById('myP');

inp.addEventListener('input', function(){
    p.textContent = inp.value;
});
</script>


<script type="text/javascript">
  $(function () {
    $('#datepicker').datetimepicker({
      // locale: moment(),
      // format: 'l',
      format: "YYYY-MM-DD" ,
      defaultDate: moment(),
      maxDate: moment().add(14, 'days'),
      minDate: moment().subtract(1, 'days')
    });
      $('input[name=tanggal]').val("<?php echo $tgl_book ?>");
  });
</script>


<!-- <script>
window.onload=function(){
      document.getElementById("post").click();
    }
</script> -->
