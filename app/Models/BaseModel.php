<?php
/*
 * *
 *   * Created by ${PRODUCT_NAME}.
 *  * User: Javier Solis Flores ( @JavierTwiteando )
 *  * Date: ${DATE}
 *  * Time: ${TIME}
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public function getStatus()
    {
        if ($this->is_active) {
            return '<button class="btn btn-sm btn-success mt-2" type="submit" title="* Click to deactivate item">Faol</button>';
        } else {
            return '<button class="btn btn-sm btn-danger mt-2" type="submit" title="* Click to activate item">Faol emas</button>';
        }
    }

    public function getImage($style = 'width:100px')
    {
        return '<img class="img-thumbnail m-1" src="' . asset($this->image) . '" style="' . $style . '">';
    }



    public function getValue($attribute)
    {
        return $this[$attribute . '_' . session('locale')];
    }

    public function editButton($url)
    {
        return sprintf("
                <a href='%s' class='btn btn-success'><i class='fa fa-edit'></i></a>
            ", $url);
    }

}
?>
