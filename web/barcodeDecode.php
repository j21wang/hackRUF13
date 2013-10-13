
<!DOCTYPE html><html><head><meta charset="UTF-8"/><title>ZXing Decoder Online</title><link type="text/css" href="style.css" rel="stylesheet"/></head><body><div id="main"><div id="header"><h1><img alt="" width="32" height="32" src="zxing-icon.png"/> ZXing Decoder Online</h1></div><p>Decode a 1D or 2D barcode from an image on the web. Supported formats include:</p><table><tr><td><ul><li>UPC-A and UPC-E</li><li>EAN-8 and EAN-13</li><li>Code 39</li></ul></td><td><ul><li>Code 93</li><li>Code 128</li><li>ITF</li></ul></td><td><ul><li>Codabar</li><li>RSS-14 (all variants)</li><li>RSS Expanded (most variants)</li><li>QR Code</li></ul></td><td><ul><li>Data Matrix</li><li>Aztec ('beta' quality)</li><li>PDF 417 ('alpha' quality)</li></ul></td></tr></table><table id="upload"><form method="get" action="http://zxing.org/w/decode"><tr><td style="text-align:right">Enter an image URL:</td><td><input name="u" size="80" type="text"/></td><td><input type="submit"/></td></tr></form><form enctype="multipart/form-data" method="post" action="decode"><tr><td style="text-align:right">Or upload a file (&lt;2MB, &lt;8MP):</td><td><input name="f" type="file"/></td><td><input type="submit"/></td></tr></form></table><p>This web application is powered by the barcode scanning implementation in the
        open source <a href="http://code.google.com/p/zxing">ZXing</a> project.</p><p>Android users may download the
        <a href="https://play.google.com/store/apps/details?id=com.google.zxing.client.android">Barcode Scanner</a> or
        <a href="https://play.google.com/store/apps/details?id=com.srowen.bs.android">Barcode Scanner+</a> application
        to access the same decoding as a mobile application.</p><p style="font-style:italic">Copyright 2008 and onwards ZXing authors</p></div><script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(decodeURIComponent("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
  var pageTracker = _gat._getTracker("UA-788492-5");
  pageTracker._initData();
  pageTracker._trackPageview();
</script></body></html>
