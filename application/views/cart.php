<?php if ($this->cart->contents()) { ?>
  <form method="post" action="cart/process">
    <table class="table table-striped">
    <tr>
        <th>Quantity</th>
        <th>Item Title</th>
        <th style="text-align: right">Item Price</th>
    </tr>
    <?php $i=0; ?>
    <?php foreach ($this->cart->contents() as $item): ?>
        <tr>
            <td><?php echo $item['qty'];?></td>
            <td><?php echo $item['name'];?></td>
            <td style="text-align: right"><?php echo $this->cart->format_number($item['price']);?></td>
        </tr>
            <?php echo '<input type="hidden" name="item_name['.$i.']" value="'.$item['name'].'"/>'; ?>
            <?php echo '<input type="hidden" name="item_code['.$i.']" value="'.$item['id'].'"/>'; ?>
            <?php echo '<input type="hidden" name="item_qty['.$i.']" value="'.$item['qty'].'"/>'; ?>
        <?php $i++;?>
    <?php endforeach; ?>
    <tr>
        <td></td>
        <td class="right"><strong>Shipping</strong></td>
        <td class="right" style="text-align: right"><?php echo $this->config->item('shipping');?></td>
    </tr>    
    <tr>
        <td></td>
        <td class="right"><strong>Tax</strong></td>
        <td class="right" style="text-align: right"><?php echo $this->config->item('tax');?></td>
    </tr>
    <tr>
        <td></td>
        <td class="right"><strong>Total</strong></td>
        <td class="right" style="text-align: right"><?php echo $this->cart->format_number($this->cart->total()+$this->config->item('shipping')+$this->config->item('tax'));?></td>
    </tr>
    </table>
    <br>
    <?php if(!$this->session->userdata('logged_in')) : ?>
    <p><a href="<?php echo base_url(); ?>users/register" class="btn btn-primary">Create an Account</a> </p>
    <p><em>You must login to make purchase</em></p>
    <?php else : ?>
    <h3>Shipping Info</h3>
    <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" name="address">
    </div>
    <div class="form-group">
        <label>Address 2</label>
        <input type="text" class="form-control" name="address2">
    </div>
    <div class="form-group">
        <label>City</label>
        <input type="text" class="form-control" name="city">
    </div>
    <div class="form-group">
        <label>State</label>
        <input type="text" class="form-control" name="state">
    </div>
    <div class="form-group">
        <label>Zipcode</label>
        <input type="text" class="form-control" name="zipcode">
    </div>
    <p><button class="btn btn-primary" type="submit" name="submit">Checkout</button></p>
    <?php endif; ?>
  </form>
<?php } else  { ?>
    <p>There is no items in your cart</p>
<?php } ?>

