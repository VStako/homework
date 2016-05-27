<?php
/**
 * @var array $data: [
 *  $USER_TYPES,
 *  $users,
 *  $current_type
 * ]
 */
?>
<form action="/" method="get">
    <select name="user_type" onchange="this.form.submit()">
        <option value="">Not selected</option>
        <?php
        for ($i = 0; $i < count($data['USER_TYPES']); $i++):
            $types = $data['USER_TYPES'][$i];
            ?>
            <option value="<?=$types;?>"
                <?=$data['current_type'] == $types ? 'selected' : ''?>>
                <?=$types;?>
            </option>
        <?php endfor;?>
    </select>
</form>
