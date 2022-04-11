<?php if (strlen($cid) <> 13): ?>
    <button onclick="window.location.reload();"><h2>สร้างไม่สำเร็จ!! กรุณากดปุ่มนี้อีกครั้ง</h2></button>
    <?php return; ?>
<?php endif; ?>
<h4>เลข CID ที่ได้คือ </h4>
<h1><?= $cid ?></h1>

