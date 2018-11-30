<table id="vitals-search"
       class="table table-bordered table-hover dataTable"
       role="grid" aria-describedby="example2_info">
    <thead>
    <tr role="row">
        <th class="sorting_asc" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1" aria-sort="ascending"
            aria-label="Rendering engine: activate to sort column descending">
            Serial#
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">
            Date
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">
            BSF
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">
            2HrBSF
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">
            Pre Lunch
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending">
            Post Lunch
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending">
            Pre Dinner
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending">
            Post Dinner
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending">
            Action
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count = 0;
    if (!empty($sugar_list)) {
        foreach ($sugar_list as $index => $v_key) {
            ?>
            <tr role="row" class="odd">
                <td class="sorting_1"><?php echo $index + 1; ?>
                    <input type="hidden" class="bsID" value="<?php echo $v_key['id']; ?>" id="regisno">
                </td>
                <?php
                $bsdate = $v_key['bs_date'];
                $date = date('d-m-Y', strtotime($bsdate));
                ?>
                <td>
                    <input type="text" class="form-control pull-right bs-datepicker" name="bs-date" autocomplete="off" placeholder="Set Date" style="width:100%" value="<?php echo $date; ?>">
                </td>
                <td><input type="text" value="<?php echo $v_key['bs_bsf']; ?>" class="editdatatab" id="bsf" /></td>
                <td><input type="text" value="<?php echo $v_key['bs_hrbsf']; ?>" class="editdata" id="hrbsf" /></td>
                <td><input type="text" value="<?php echo $v_key['bs_pre_lunch']; ?>" class="editdata" id="prelunch" /></td>
                <td><input type="text" value="<?php echo $v_key['bs_post_lunch']; ?>" class="editdata" id="postlunch" /></td>
                <td><input type="text" value="<?php echo $v_key['bs_pre_dinner']; ?>" class="editdata" id="predinner" /></td>
                <td><input type="text" value="<?php echo $v_key['bs_post_dinner']; ?>" class="editdata" id="postdinner" /></td>
                <td>
                    <button class="btn btn-default delete-blood-report">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <br />
                    <button class="btn btn-default update-blood-report ">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            <?php
            $count = $index + 1;
        }
    }
    ?>
    <tr>
        <td ><?php echo $count + 1; ?></td>
        <td><input type="text" class="form-control pull-right" id="bs-date" name="bs_date" autocomplete="off" placeholder="Set Date" style="width:100%" ></td>
        <td><input type="text" class="editdata onload-cur" id="bs-bsf"></td>
        <td><input type="text" class="editdata" id="bs-hrbsf"></td>
        <td><input type="text" class="editdata" id="bs-prelunch"></td>
        <td><input type="text" class="editdata" id="bs-postlunch"></td>
        <td><input type="text" class="editdata" id="bs-predinner"></td>
        <td><input type="text" class="editdata" id="bs-postdinner"></td>
        <td><button class="btn btn-default save-sugar-report" id="save-sugar-report">
                <i class="fa fa-save" aria-hidden="true"></i>
            </button>
        </td>
    </tr>
    </tbody>
    <tfoot>

    </tfoot>
</table>