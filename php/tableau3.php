
<table border="1">

    <?php for ($l=0; $l < 10; $l++): ?>

        <tr class="">

            <?php for ($i=0; $i < 10; $i++): ?>
                <?php if ($l==0) { ?>
                    <th><?= $i ?></th>
                <?php } else if ($i==0) { ?>
                    <th><?= $l ?></th>
                <?php } else { ?>
                    <td><?= $i*$l ?></td>
                <?php } ?>
            <?php endfor; ?>

        </tr>

    <?php endfor; ?>

</table>




