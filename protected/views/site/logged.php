<?php
/* @var $this UserController */

$this->breadcrumbs=array(
   'Logged User Info',
);
?>
<h1>Logged user info</h1>
<?php
/*foreach($model as $user)
{
  echo "$user->username  $user->log_in_time<br>";

}
*/?>
<table>
    <thead><tr><th>UserName</th><th>Log In Time</th><th>Log Out Time</th></tr></thead>
    <tbody>
    <?php foreach ($model as $users) : ?>
        <tr>
            <td><?= htmlspecialchars($users->username) ?></td>
            <td><?= htmlspecialchars($users->log_in_time) ?></td>
          <!--  <td><?/*= htmlspecialchars($users->log_ot_time) */?></td>-->
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
