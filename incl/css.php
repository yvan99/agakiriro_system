<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agakiriro Smart System</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="../css/theme.css" rel="stylesheet">
        <link type="text/css" href="../images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
            <script type="text/javascript">
function reload(form)
{
var val=form.productTag.options[form.productTag.options.selectedIndex].value;
self.location='purchaseOrder.php?product=' + val ;
}
//-->

function refresh(form)
{
var val=form.productTag.options[form.productTag.options.selectedIndex].value;
self.location='saleOrder.php?product=' + val ;
}
function change(form){
    var val=form.district.options[form.district.options.selectedIndex].value;
    self.location='districtReport.php?district=' + val ;  
}

function changeSite(form){
    var val=form.site.options[form.site.options.selectedIndex].value;
    self.location='siteReport.php?site=' + val ;  
}
function changeDistrict(form){
    var val=form.district.options[form.district.options.selectedIndex].value;
    self.location='districtBDF.php?district=' + val ;  
}
function changeSiteReport(form){
    var val=form.site.options[form.site.options.selectedIndex].value;
    self.location='siteBDF.php?site=' + val ;  
}


</script>
    </head>