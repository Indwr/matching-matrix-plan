<div id="voucharFormate" class="ng-scope">
    <center>
        <table cellpadding="0" cellspacing="0" width="85%" align="center" class="">
            <tbody>
                <tr>
                    <td valign="top" class="alt1">
                        <table border="0" cellpadding="0" cellspacing="0" width="98%" align="center" class="">
                            <tbody>
                                <tr>
                                    <td class="pageleft" valign="top">
                                        <div class="pageleftimg">
                                        </div>
                                    </td>
                                    <td class="pagemid" valign="top">
                                        <center>
                                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="8">
                                                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="25%" align="left" valign="top">
                                                                            <!-- ngIf: isNewLogo==0 --><img src="images/logo-m.png" alt="" ng-if="isNewLogo==0" class="ng-scope">
                                                                            <!-- end ngIf: isNewLogo==0 -->
                                                                            <!-- ngIf: isNewLogo==1 -->
                                                                        </td>
                                                                        <td width="50%" class="Logo_company" align="center" valign="top">

                                                                            <!-- ngIf: isNewLogo==0 -->
                                                                            <div ng-if="isNewLogo==0" class="ng-scope">
                                                                                <p>
                                                                                    <b>
                                                                                        <label id="lblCompanyName" class=""><b class="ng-binding">Amoyo</b></label>

                                                                                    <!--<asp:Label ID="lblCompanyName" runat="server" Text="MJL & CO." Font-Bold="true"></asp:Label>-->
                                                                                    </b>
                                                                                    <br>
                                                                                    <label id="lblAddress1" class="ng-binding"><b>Warehouse Address:</b> Plot No. 33, Hardochanni Bypass Road, Opp. Sidhu Service Station, Gurdaspur, Punjab 143521</label>
                                                                                    <label id="lblAddress2" class=""><b>Registered &amp; Corporate office:</b> Plot No. 33, Hardochanni Bypass Road, Opp. Sidhu Service Station, Gurdaspur, Punjab 143521</label>
                                                                                    <label id="lblCity" class="">CIN Number: </label>
                                                                                    <label id="lblState" class="">Telephone No: 7065325066</label>
                                                                                    <label id="lblState" class="">Mail ID: info@amoyo.com</label>
                                                                                    <label id="lblState" class="">Website: www.amoyo.com</label>
                                                                                    <label id="lblState" class="ng-binding">GSTIN:</label>
                                                                                </p>
                                                                            </div>
                                                                            <!-- end ngIf: isNewLogo==0 -->

                                                                        </td>
                                                                        <td width="25%" valign="top" align="right" class="Logo_company">
                                                                            <p>
                                                                                Original for Receipient
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="8">
                                                            <hr color="#000">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="100%" align="center" colspan="8">
                                                            <u>
                                                                <label id="lblhead" style="font-size:17px"><b>TAX INVOICE</b></label>
                                                            </u>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="8">
                                                            <hr color="#000">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="8" height="5">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%" align="left" height="15" class="lblcls">
                                                            Invoice No.
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" colspan="2" height="15">
                                                            <label id="lblinvno" class="lblcls ng-binding">#<?php echo $order['order_id'];?></label>

                                                            <!--<asp:Label ID="lblinvno" runat="server" Text="RE00115/17-18/283" class="lblcls"></asp:Label>-->
                                                        </td>
                                                        <td width="15%" align="left" class="lblcls" height="15">
                                                            Transaport Mode
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblTransmode" class="lblcls ng-binding">Courier</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%" align="left" height="15" class="lblcls">
                                                            Invoice Date
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" colspan="2" height="15">
                                                            <label id="lblinvdate" class="lblcls ng-binding"><?php echo $order['created_at'];?></label>

                                                            <!--<asp:Label ID="lblinvdate" runat="server" Text="25 June 2017" class="lblcls"></asp:Label>-->
                                                        </td>
                                                        <td width="15%" align="left" class="lblcls" height="15">
                                                            Vehicle No.
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblvehno" class="lblcls"></label>

                                                            <!--<asp:Label ID="lblvehno" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%" align="left" height="15" class="lblcls">
                                                            Reverse Charge (Y/N)
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="20%" align="left" height="15">
                                                            <label id="lblrevchrg" class="lblcls"></label>

                                                            <!--<asp:Label ID="lblrevchrg" runat="server" class="lblcls" Text="00"></asp:Label>-->
                                                        </td>
                                                        <td width="10%" align="left" class="lblcls" height="15">
                                                            N
                                                        </td>
                                                        <td width="15%" align="left" class="lblcls" height="15">
                                                            Date Of Supply
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblsuppdate" class="lblcls ng-binding"><?php echo $order['created_at'];?></label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%" align="left" height="15" class="lblcls">
                                                            State :
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="20%" align="left" height="15">
                                                            <label id="lblstatename" class="lblcls ng-binding"><?php echo $state['name'];?></label>

                                                            <!--<asp:Label ID="lblstatename" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                        <td width="10%" align="left" class="lblcls" height="15">
                                                            Code :
                                                            <label id="lblstcode" class="lblcls ng-binding">07</label>

                                                            <!-- <asp:Label ID="lblstcode" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                        <td width="15%" align="left" class="lblcls" height="15">
                                                            Place Of Supply
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblplcsupp" class="lblcls ng-binding"><?php echo $shipping_details['city'];?></label>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="8" height="5">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="8">
                                                            <hr color="#000">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" width="50%" align="center" class="lblcls">
                                                            <b>Bill To Party</b>
                                                        </td>
                                                        <td colspan="4" width="50%" align="center" class="lblcls">
                                                            <b>Ship To Party</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="8">
                                                            <hr color="#000">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%" align="left" height="15" class="lblcls">
                                                            Associate Id :
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblbillname" class="lblcls ng-binding"><?php echo $user['user_id'];?></label>

                                                            <!--<asp:Label ID="lblbillname" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                        <td width="15%" align="left" class="lblcls" height="15">
                                                            Associate Id :
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblshipname" class="lblcls ng-binding"><?php echo $user['user_id'];?></label>

                                                            <!--<asp:Label ID="lblshipname" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%" align="left" height="15" class="lblcls">
                                                            Name :
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblbillname" class="lblcls ng-binding"><?php echo $user['first_name'] . ' '  . $user['last_name'];?></label>

                                                            <!--<asp:Label ID="lblbillname" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                        <td width="15%" align="left" class="lblcls" height="15">
                                                            Name :
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblshipname" class="lblcls ng-binding"><?php echo $shipping_details['name'];?></label>

                                                            <!--<asp:Label ID="lblshipname" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%" align="left" height="15" class="lblcls">
                                                            Address :
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblbilladdr" class="lblcls ng-binding"><?php echo $user['address'];?></label>

                                                            <!--<asp:Label ID="lblbilladdr" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                        <td width="15%" align="left" class="lblcls" height="15">
                                                            Address :
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblshipaddr" class="lblcls ng-binding"><?php echo $shipping_details['address'];?></label>

                                                            <!--<asp:Label ID="lblshipaddr" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%" align="left" height="15" class="lblcls">
                                                            GSTIN :
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblbgstin" class="lblcls ng-binding"></label>

                                                            <!--<asp:Label ID="lblbgstin" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                        <td width="15%" align="left" class="lblcls" height="15">
                                                            GSTIN :
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblsgstin" class="lblcls ng-binding"></label>

                                                            <!--<asp:Label ID="lblsgstin" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%" align="left" height="15" class="lblcls">
                                                            State :
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="20%" align="left" height="15">
                                                            <label id="lblbillstate" class="lblcls ng-binding">Delhi</label>

                                                            <!--<asp:Label ID="lblbillstate" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                        <td width="10%" align="left" class="lblcls" height="15">
                                                            Code :
                                                            <label id="lblsscode" class="lblcls ng-binding">07</label>
                                                            <!--<asp:Label ID="lblbscode" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                        <td width="15%" align="left" class="lblcls" height="15">
                                                            State :
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="20%" align="left" height="15">
                                                            <label id="lblshpstate" class="lblcls ng-binding">Delhi</label>

                                                            <!--<asp:Label ID="lblshpstate" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                        <td width="10%" align="left" class="lblcls" height="15">
                                                            Code :
                                                            <label id="lblsscode" class="lblcls ng-binding">07</label>

                                                            <!--<asp:Label ID="lblsscode" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%" align="left" height="15" class="lblcls">
                                                            PinCode :
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblbillname" class="lblcls ng-binding"><?php echo $user['postal_code'];?></label>
                                                        </td>
                                                        <td width="15%" align="left" class="lblcls" height="15">
                                                            PinCode :
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblshipname" class="lblcls"><b class="ng-binding"><?php echo $shipping_details['postal_code'];?></b></label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%" align="left" height="15" class="lblcls">
                                                            <!--PinCode :-->
                                                        </td>
                                                        <td width="5%" height="15">
                                                            <!--:-->
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblbillname" class="lblcls">
                                                                <!--{{OldOrderInvoice[0].APincode}}-->
                                                            </label>
                                                        </td>
                                                        <td width="15%" align="left" class="lblcls" height="15">
                                                            Mobile No :
                                                        </td>
                                                        <td width="5%" height="15">
                                                            :
                                                        </td>
                                                        <td width="30%" align="left" height="15" colspan="2">
                                                            <label id="lblshipname" class="lblcls"><b class="ng-binding"><?php echo $shipping_details['phone'];?></b></label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="8">
                                                            <hr color="#000">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table border="1" width="100%" cellspacing="0" class="hide" style="display:none;">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">S No.</th>
                                                        <th rowspan="2">Product Description</th>
                                                        <th rowspan="2">HSN Code / SAC Code</th>
                                                        <th rowspan="2">UOM</th>
                                                        <th rowspan="2">Qty</th>
                                                        <th rowspan="2">Rate</th>
                                                        <th rowspan="2">Amount</th>
                                                        <th rowspan="2">Discount</th>
                                                        <th rowspan="2">Taxable Amount</th>
                                                        <th colspan="2">SGST</th>
                                                        <th colspan="2">CGST</th>
                                                        <th rowspan="2">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Rate</th>
                                                        <th>Amount</th>
                                                        <th>Rate</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $total_mrp = 0 ;
                                                    
                                                    foreach($order_details as $key=> $product){
                                                        $mrp = $product['mrp'] * $product['quantity'];
                                                        $discount = $product['discount'] * $product['quantity'];
                                                        $igst = $product['igst'] * $product['quantity'];
                                                        $sgst = $product['sgst'] * $product['quantity'];
                                                        $total_amount = ($mrp - $discount) + ($igst + $sgst);
                                                        echo'<tr>';
                                                        echo'<td style="text-align:center">'.($key+1).'</td>';
                                                        echo'<td style="text-align:center">'.$product['title'].'</td>';
                                                        echo'<td style="text-align:center"></td>';
                                                        echo'<td style="text-align:center"></td>';
                                                        echo'<td style="text-align:center">'.$product['quantity'].'</td>';
                                                        echo'<td style="text-align:center">'.$product['mrp'].'</td>';
                                                        echo'<td style="text-align:center">'.$product['mrp'] * $product['quantity'].'</td>';
                                                        echo'<td style="text-align:center">'.$discount.'</td>';
                                                        echo'<td style="text-align:center">'.($mrp - $discount).'</td>';
                                                        echo'<td style="text-align:center"> '.($product['igst'] * 100 / $product['mrp']).'</td>';
                                                        echo'<td style="text-align:center">'.$igst.' </td>';
                                                        echo'<td style="text-align:center"> '.($product['sgst'] * 100 / $product['mrp']).'</td>';
                                                        echo'<td style="text-align:center">'.$sgst.' </td>';
                                                        echo'<td style="text-align:center">'.$total_amount.' </td>';
                                                        echo'</tr>';
                                                    }
                                                    // die('here');
                                                    ?>
                                                    <tr ng-repeat="Products in OldOrderInvoice" class="ng-scope">
                                                        <td style="text-align:center" class="ng-binding">1</td>
                                                        <td style="text-align:center" class="ng-binding">Moisturizing Cream (WSPC00002)</td>
                                                        <td style="text-align:right" class="ng-binding">33049930</td>
                                                        <td style="text-align:center" class="ng-binding">Nos</td>
                                                        <td style="text-align: right" class="ng-binding">2</td>
                                                        <td style="text-align: right" class="ng-binding">275.43</td>
                                                        <td style="text-align: right" class="ng-binding">550.85</td>
                                                        <td style="text-align: right" class="ng-binding">0.00</td>
                                                        <!--<td style="text-align: right">{{Products.GST_amt}}</td>-->
                                                        <td style="text-align: right" class="ng-binding">550.85</td>
                                                        <td style="text-align: right" class="ng-binding">9</td>
                                                        <td style="text-align: right" class="ng-binding">49.58</td>
                                                        <td style="text-align: right" class="ng-binding">9</td>
                                                        <td style="text-align: right" class="ng-binding">49.58</td>
                                                        <td style="text-align: right" class="ng-binding">650.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="display:none"></td>
                                                        <td></td>
                                                        <td style="text-align:right">Total</td>
                                                        <td style="text-align:center"></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td style="text-align:right" class="ng-binding">1,188.54</td>
                                                        <td style="text-align:right" class="ng-binding">0.00</td>
                                                        <!--<td style="text-align:right">{{TotalGST_amt | number : 2}}</td>-->
                                                        <td style="text-align:right" class="ng-binding">1,188.54</td>
                                                        <td></td>
                                                        <td style="text-align:right" class="ng-binding">79.72</td>
                                                        <td></td>
                                                        <td style="text-align:right" class="ng-binding">79.72</td>
                                                        <td style="text-align:right" class="ng-binding">1,348.00</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table border="1" width="100%" cellspacing="0" ng-show="OUTSTATE" class="">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">S No.</th>
                                                        <th rowspan="2">Product Description</th>
                                                        <th rowspan="2">HSN Code / SAC Code</th>
                                                        <th rowspan="2">UOM</th>
                                                        <th rowspan="2">Qty</th>
                                                        <th rowspan="2">Rate</th>
                                                        <th rowspan="2">Amount</th>
                                                        <th rowspan="2">Discount</th>
                                                        <!--<th rowspan="2">Taxable Value</th>-->
                                                        <th rowspan="2">Taxable Amount</th>
                                                        <th colspan="2">IGST</th>
                                                        <!--<th colspan="2">SGST</th>-->
                                                        <th rowspan="2">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Rate</th>
                                                        <th>Amount</th>
                                                        <!--<th>Rate</th>
                                    <th>Amount</th>-->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- ngRepeat: Products in OldOrderInvoice -->
                                                    <tr ng-repeat="Products in OldOrderInvoice" class="ng-scope">
                                                        <td style="text-align:center" class="ng-binding">1</td>
                                                        <td style="text-align:center" class="ng-binding">Moisturizing Cream (WSPC00002)</td>
                                                        <td style="text-align:right" class="ng-binding">33049930</td>
                                                        <td style="text-align:center" class="ng-binding">Nos</td>
                                                        <td style="text-align: right" class="ng-binding">2</td>
                                                        <td style="text-align: right" class="ng-binding">275.43</td>
                                                        <td style="text-align: right" class="ng-binding">550.85</td>
                                                        <td style="text-align: right" class="ng-binding">0.00</td>
                                                        <!--<td style="text-align: right">{{Products.GST_amt}}</td>-->
                                                        <td style="text-align: right" class="ng-binding">550.85</td>
                                                        <td style="text-align: right" class="ng-binding">18</td>
                                                        <td style="text-align: right" class="ng-binding">99.15</td>
                                                        <!--<td style="text-align: right">{{Products.SGST_rate}}</td>
        <td style="text-align: right">{{Products.SGST_amt}}</td>-->
                                                        <td style="text-align: right" class="ng-binding">650.00</td>
                                                    </tr>
                                                    <!-- end ngRepeat: Products in OldOrderInvoice -->
                                                    <tr ng-repeat="Products in OldOrderInvoice" class="ng-scope">
                                                        <td style="text-align:center" class="ng-binding">2</td>
                                                        <td style="text-align:center" class="ng-binding">Neem &amp; Ashwagandha Face Wash (WSPC00001)</td>
                                                        <td style="text-align:right" class="ng-binding">34013090</td>
                                                        <td style="text-align:center" class="ng-binding">Nos</td>
                                                        <td style="text-align: right" class="ng-binding">1</td>
                                                        <td style="text-align: right" class="ng-binding">176.27</td>
                                                        <td style="text-align: right" class="ng-binding">176.27</td>
                                                        <td style="text-align: right" class="ng-binding">0.00</td>
                                                        <!--<td style="text-align: right">{{Products.GST_amt}}</td>-->
                                                        <td style="text-align: right" class="ng-binding">176.27</td>
                                                        <td style="text-align: right" class="ng-binding">18</td>
                                                        <td style="text-align: right" class="ng-binding">31.73</td>
                                                        <!--<td style="text-align: right">{{Products.SGST_rate}}</td>
        <td style="text-align: right">{{Products.SGST_amt}}</td>-->
                                                        <td style="text-align: right" class="ng-binding">208.00</td>
                                                    </tr>
                                                    <!-- end ngRepeat: Products in OldOrderInvoice -->
                                                    <tr ng-repeat="Products in OldOrderInvoice" class="ng-scope">
                                                        <td style="text-align:center" class="ng-binding">3</td>
                                                        <td style="text-align:center" class="ng-binding">Flip Chart (WSBSM033)</td>
                                                        <td style="text-align:right" class="ng-binding">49011020</td>
                                                        <td style="text-align:center" class="ng-binding">Nos</td>
                                                        <td style="text-align: right" class="ng-binding">2</td>
                                                        <td style="text-align: right" class="ng-binding">190.48</td>
                                                        <td style="text-align: right" class="ng-binding">380.95</td>
                                                        <td style="text-align: right" class="ng-binding">0.00</td>
                                                        <!--<td style="text-align: right">{{Products.GST_amt}}</td>-->
                                                        <td style="text-align: right" class="ng-binding">380.95</td>
                                                        <td style="text-align: right" class="ng-binding">5</td>
                                                        <td style="text-align: right" class="ng-binding">19.05</td>
                                                        <!--<td style="text-align: right">{{Products.SGST_rate}}</td>
        <td style="text-align: right">{{Products.SGST_amt}}</td>-->
                                                        <td style="text-align: right" class="ng-binding">400.00</td>
                                                    </tr>
                                                    <!-- end ngRepeat: Products in OldOrderInvoice -->
                                                    <tr ng-repeat="Products in OldOrderInvoice" class="ng-scope">
                                                        <td style="text-align:center" class="ng-binding">4</td>
                                                        <td style="text-align:center" class="ng-binding">Business Leaflet Hindi 10 Pack (WSBSM0012)</td>
                                                        <td style="text-align:right" class="ng-binding">49011020</td>
                                                        <td style="text-align:center" class="ng-binding">Nos</td>
                                                        <td style="text-align: right" class="ng-binding">1</td>
                                                        <td style="text-align: right" class="ng-binding">38.1</td>
                                                        <td style="text-align: right" class="ng-binding">38.1</td>
                                                        <td style="text-align: right" class="ng-binding">0.00</td>
                                                        <!--<td style="text-align: right">{{Products.GST_amt}}</td>-->
                                                        <td style="text-align: right" class="ng-binding">38.10</td>
                                                        <td style="text-align: right" class="ng-binding">5</td>
                                                        <td style="text-align: right" class="ng-binding">1.9</td>
                                                        <!--<td style="text-align: right">{{Products.SGST_rate}}</td>
        <td style="text-align: right">{{Products.SGST_amt}}</td>-->
                                                        <td style="text-align: right" class="ng-binding">40.00</td>
                                                    </tr>
                                                    <!-- end ngRepeat: Products in OldOrderInvoice -->
                                                    <tr ng-repeat="Products in OldOrderInvoice" class="ng-scope">
                                                        <td style="text-align:center" class="ng-binding">5</td>
                                                        <td style="text-align:center" class="ng-binding">Handling Charges (HC996812)</td>
                                                        <td style="text-align:right" class="ng-binding">996812</td>
                                                        <td style="text-align:center" class="ng-binding">Nos</td>
                                                        <td style="text-align: right" class="ng-binding">1</td>
                                                        <td style="text-align: right" class="ng-binding">42.37</td>
                                                        <td style="text-align: right" class="ng-binding">42.37</td>
                                                        <td style="text-align: right" class="ng-binding">0.00</td>
                                                        <!--<td style="text-align: right">{{Products.GST_amt}}</td>-->
                                                        <td style="text-align: right" class="ng-binding">42.37</td>
                                                        <td style="text-align: right" class="ng-binding">18</td>
                                                        <td style="text-align: right" class="ng-binding">7.63</td>
                                                        <!--<td style="text-align: right">{{Products.SGST_rate}}</td>
        <td style="text-align: right">{{Products.SGST_amt}}</td>-->
                                                        <td style="text-align: right" class="ng-binding">50.00</td>
                                                    </tr>
                                                    <!-- end ngRepeat: Products in OldOrderInvoice -->
                                                    <tr>
                                                        <td style="display:none"></td>
                                                        <td></td>
                                                        <td style="text-align:right">Total</td>
                                                        <td style="text-align:center"></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td style="text-align:right" class="ng-binding">1,188.54</td>
                                                        <td style="text-align:right" class="ng-binding">0.00</td>
                                                        <!--<td style="text-align:right">{{TotalGST_amt | number : 2}}</td>-->
                                                        <td style="text-align:right" class="ng-binding">1,188.54</td>
                                                        <td></td>

                                                        <!--<td style="text-align:right">{{TotalSGST_amt|number : 2}}</td>-->
                                                        <td style="text-align:right" class="ng-binding">159.46</td>
                                                        <td style="text-align:right" class="ng-binding">1,348.00</td>

                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table border="1" cellspacing="0" cellpadding="0" width="100%" ng-show="INSIDESTATE" class="ng-hide">

                                                <tbody>
                                                    <tr></tr>
                                                    <tr>
                                                        <td colspan="1" rowspan="8" valign="top" width="46%" class="lblcls">
                                                            Total Invoice Amount in Words :
                                                            <br>
                                                            <br>
                                                            <label id="lblamtwords" class="lblcls ng-binding"><?php echo getIndianCurrency((float)$order['amount']);?></label>

                                                            <!--<asp:Label ID="lblamtwords" runat="server" Text="30" class="lblcls"></asp:Label>-->
                                                        </td>
                                                        <td width="20%" valign="top" class="lblcls">
                                                            Total Amount Before Tax :
                                                        </td>
                                                        <td width="10%" valign="top">
                                                            <div align="right" class="ng-binding">
                                                                1,188.54
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td width="20%" valign="top" class="lblcls">
                                                            Add : CGST
                                                        </td>
                                                        <td width="10%" valign="top">
                                                            <div align="right">
                                                                <label id="lblgst" class="lblcls ng-binding">79.72</label>

                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td width="20%" valign="top" class="lblcls">
                                                            Add : SGST
                                                        </td>
                                                        <td width="10%" valign="top">
                                                            <div align="right">
                                                                <label id="lblgst" class="lblcls ng-binding">79.72</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20%" valign="top" class="lblcls">
                                                            Total Tax Amount
                                                        </td>
                                                        <td width="10%" valign="top">
                                                            <div align="right">
                                                                <label id="lblgst" class="lblcls ng-binding">159.46</label>

                                                                <!--<asp:Label ID="lblgst" runat="server" Text="30" class="lblcls"></asp:Label>-->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20%" valign="top" class="lblcls">
                                                            Total Amount after Tax :
                                                        </td>
                                                        <td width="10%" valign="top">
                                                            <div align="right">
                                                                <label id="lbltotamt" class="lblcls ng-binding">1,348.00</label>

                                                                <!--<asp:Label ID="lbltotamt" runat="server" Text="30" class="lblcls"></asp:Label>-->
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td width="20%" valign="top" class="lblcls">
                                                            Discount Amount:
                                                        </td>
                                                        <td width="10%" valign="top">
                                                            <div align="right">
                                                                <label id="lbltotamt" class="lblcls ng-binding">0.00</label>

                                                                <!--<asp:Label ID="lbltotamt" runat="server" Text="30" class="lblcls"></asp:Label>-->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20%" valign="top" class="lblcls">
                                                            Total Amount :
                                                        </td>
                                                        <td width="10%" valign="top">
                                                            <div align="right">
                                                                <label id="lbltotamt" class="lblcls ng-binding">1,348.00</label>

                                                                <!--<asp:Label ID="lbltotamt" runat="server" Text="30" class="lblcls"></asp:Label>-->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table border="1" cellspacing="0" cellpadding="0" width="100%" ng-show="OUTSTATE" class="">

                                                <tbody>
                                                    <tr></tr>
                                                    <tr>
                                                        <td colspan="1" rowspan="6" valign="top" width="37%" class="lblcls">
                                                            Total Invoice Amount in Words :
                                                            <br>
                                                            <br>
                                                            <label id="lblamtwords" class="lblcls ng-binding"><?php echo getIndianCurrency((float)$order['amount']);?></label>

                                                            <!--<asp:Label ID="lblamtwords" runat="server" Text="30" class="lblcls"></asp:Label>-->
                                                        </td>
                                                        <td width="20%" valign="top" class="lblcls">
                                                            Total Amount Before Tax :
                                                        </td>
                                                        <td width="10%" valign="top">
                                                            <div align="right" class="ng-binding">
                                                                1,188.54
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20%" valign="top" class="lblcls">
                                                            Add : IGST
                                                        </td>
                                                        <td width="10%" valign="top">
                                                            <div align="right">
                                                                <label id="lblgst" class="lblcls ng-binding">159.46</label>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20%" valign="top" class="lblcls">
                                                            Total Tax Amount
                                                        </td>
                                                        <td width="10%" valign="top">
                                                            <div align="right">
                                                                <label id="lblgst" class="lblcls ng-binding">159.46</label>

                                                                <!--<asp:Label ID="lblgst" runat="server" Text="30" class="lblcls"></asp:Label>-->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20%" valign="top" class="lblcls">
                                                            Total Amount after Tax :
                                                        </td>
                                                        <td width="10%" valign="top">
                                                            <div align="right">
                                                                <label id="lbltotamt" class="lblcls ng-binding">1,348.00</label>

                                                                <!--<asp:Label ID="lbltotamt" runat="server" Text="30" class="lblcls"></asp:Label>-->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20%" valign="top" class="lblcls">
                                                            Discount Amount :
                                                        </td>
                                                        <td width="10%" valign="top">
                                                            <div align="right">
                                                                <label id="lbltotamt" class="lblcls ng-binding">0.00</label>

                                                                <!--<asp:Label ID="lbltotamt" runat="server" Text="30" class="lblcls"></asp:Label>-->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20%" valign="top" class="lblcls">
                                                            Total Amount :
                                                        </td>
                                                        <td width="10%" valign="top">
                                                            <div align="right">
                                                                <label id="lbltotamt" class="lblcls ng-binding">1,348.00</label>

                                                                <!--<asp:Label ID="lbltotamt" runat="server" Text="30" class="lblcls"></asp:Label>-->
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td width="40%" valign="top">
                                                            <table border="1" cellpadding="0" cellspacing="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center" colspan="2" class="lblcls">
                                                                            Bank Details
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left" width="20%" class="lblcls">
                                                                            Bank A/C :
                                                                        </td>
                                                                        <td align="left">
                                                                            <label id="Label2" class="lblcls"></label>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left" width="20%" class="lblcls">
                                                                            Bank IFSC :
                                                                        </td>
                                                                        <td align="left">
                                                                            <label id="Label3" class="lblcls"></label>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left" width="20%" class="lblcls">
                                                                            Mode of Payment:
                                                                        </td>
                                                                        <td align="center">
                                                                            <label id="Label2" class="lblcls ng-binding">PaymentGateWay</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2" class="lblcls" align="center">
                                                                            Terms &amp; Conditions
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="84" colspan="2">
                                                                            &nbsp;
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="30%" valign="top">
                                                            <table border="1" cellpadding="0" cellspacing="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td height="173">
                                                                            &nbsp;
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="lblcls" style="text-align:center">
                                                                            Common Seal
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="30%" valign="top">
                                                            <table border="1" cellpadding="0" cellspacing="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="20%" valign="top" class="lblcls">
                                                                            GST on Reverse Charge :
                                                                        </td>
                                                                        <td width="10%" valign="top" align="right">
                                                                            <label id="Label1" class="lblcls">N</label>

                                                                            <!-- <asp:Label ID="Label1" runat="server" Text="00" class="lblcls"></asp:Label>-->
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2" valign="top" class="lblcls">
                                                                            <small>Ceritified that the particulars given above are true and correct</small>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2" valign="top" align="center" class="lblcls">
                                                                            Amoyo
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="102" colspan="2">
                                                                            &nbsp;
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="lblcls" align="center">
                                                                            Authorised signatory
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </center>
                                    </td>
                                    <td class="pageright" valign="top">
                                        <div class="pagerightimg">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" valign="top" class="pageleft">
                                        <div class="pagebot">
                                            <div class="pagebr">
                                                <div class="pagebl">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</div>