<div id="page">

    <a href="/attendances/add" class="material-btn">Dodaj</a><br><br>

    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Data</th>
                <th>Godzina wejścia</th>
                <th>Godzina wyjścia</th>
                <th>Czas pracy</th>
                <th>Uwagi</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
            /** @var \model\Attendance $attendance */
            $total_time = 0;
            if (isset($attendances)) {
                foreach ($attendances as $attendance) { ?>
                    <tr>
                        <td><?= \util\DateUtils::getPlainDate($attendance->getTimeIn()); ?></td>
                        <td><?= \util\DateUtils::getShortTime($attendance->getTimeIn()); ?></td>
                        <td><?= \util\DateUtils::getShortTime($attendance->getTimeOut()); ?></td>
                        <td><?php
                            $to_time = strtotime($attendance->getTimeOut());
                            $from_time = strtotime($attendance->getTimeIn());
                            $time = round(abs($to_time - $from_time) /3600, 2);
                            $total_time += $time;
                            echo $time . "h";
                            ?> </td>
                        <td><?= $attendance->getNotes(); ?></td>
                        <td><a href="/attendances/<?= $attendance->getId(); ?>/edit" class="material-btn">Edytuj</a></td>
                        <td><a href="/attendances/<?= $attendance->getId(); ?>/delete" class="material-btn">Usuń</a></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
    </div>
    <br>

    <?php echo "Łączny czas pracy : " . $total_time . "h"; ?>
</div>
