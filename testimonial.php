<?php
include "admin/db/connections.php";
$book = new User();
?>

<div class="testimonials-block block hidden-xs">
    <div class="page-header center">
        <div class="page-header-inner">
            <div class="line">
                <hr/>
            </div>

            <div class="heading">
                <h2>Our Satisfied Customers</h2>
            </div><!-- /.heading -->

            <div class="line">
                <hr/>
            </div><!-- /.line -->
        </div><!-- /.page-header-inner -->
    </div><!-- /.page-header -->

    <div class="row">
        <?php
        $query = $book -> selectTestimonials();
        foreach ($query as $row)
        {
        ?>
            <div class="col-sm-12 col-md-6">
                <div class="testimonial white">
                    <div class="inner">
                        <div class="row">
                            <div class="col-sm-3 col-md-4">
                                <div class="picture">
                                    <img src="admin/photos/testimonial/male.png" width="80%" alt="#">
                                </div><!-- /.picture -->

                            </div><!-- /.col-md-4 -->

                            <div class="col-sm-9 col-md-8">
                                <div class="description quote">
                                    <p>
                                        <i>
                                            "<?php echo $row['testimonial']; ?>"
                                        </i>
                                    </p>
                                </div><!-- /.description -->

                                <div class="star-rating">
<!--                                    --><?php //for($i=0;$i<=$row['stars'];$i++)
//                                    {
//                                    ?>
<!--                                        <input name="star0" type="radio" class="star icon-normal-star" checked="checked" disabled="disabled">-->
<!--                                    --><?php
//                                    } ?>
                                    <input name="star0" type="radio" class="star icon-normal-star" checked="checked" disabled="disabled">
<!--                                    <input name="star0" type="radio" class="star icon-normal-star" checked="checked" disabled="disabled">-->
<!--                                    <input name="star0" type="radio" class="star icon-normal-star" checked="checked" disabled="disabled">-->
<!--                                    <input name="star0" type="radio" class="star icon-normal-star" checked="checked" disabled="disabled">-->
<!--                                    <input name="star0" type="radio" class="star icon-normal-star" checked="checked" disabled="disabled">-->
                                </div><!-- /.star-rating -->
                                <div class="author">
                                    <strong><?php echo $row['name']; ?></strong>
                                </div>
                                <!-- /.author -->
                            </div><!-- /.col-md-8 -->
                        </div><!-- /.row -->
                    </div><!-- /.inner -->
                </div><!-- /.testimonial -->
            </div><!-- /.col-md-6 -->
        <?php
        }
        ?>
    </div><!-- /.row -->
</div><!-- /.testimonials-block -->