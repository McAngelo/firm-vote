<!DOCTYPE html>
<head>
    <title>HTML5 TABLE FORMATTING</title>
 
    <style type="text/css">
 
        /*** central column on page ***/
        div#divContainer
        {
            max-width: 800px;
            margin: 0 auto;
            font-family: Calibri;
            padding: 0.5em 1em 1em 1em;
 
            /* rounded corners */
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
 
            /* add gradient */
            background-color: #808080;
            background: -webkit-gradient(linear, left top, left bottom, from(#606060), to(#808080));
            background: -moz-linear-gradient(top, #606060, #808080);
 
            /* add box shadows */
            -moz-box-shadow: 5px 5px 10px rgba(0,0,0,0.3);
            -webkit-box-shadow: 5px 5px 10px rgba(0,0,0,0.3);
            box-shadow: 5px 5px 10px rgba(0,0,0,0.3);
        }
 
        h1 {color:#FFE47A; font-size:1.5em;}
 
        /*** sample table to demonstrate CSS3 formatting ***/
        table.formatHTML5 {
            width: 100%;
            border-collapse:collapse;
            text-align:left;
            color: #606060;
        }
 
        /*** table's thead section, head row style ***/
        table.formatHTML5 thead tr td  {
            background-color: White;
            vertical-align:middle;
            padding: 0.6em;
            font-size:0.8em;
        }
 
        /*** table's thead section, coulmns header style ***/
        table.formatHTML5 thead tr th
        {
            padding: 0.5em;
            /* add gradient */
            background-color: #808080;
            background: -webkit-gradient(linear, left top, left bottom, from(#606060), to(#909090));
            background: -moz-linear-gradient(top, #606060, #909090);
            color: #dadada;
        }
 
        /*** table's tbody section, odd rows style ***/
        table.formatHTML5 tbody tr:nth-child(odd) {
           background-color: #fafafa;
        }
 
        /*** hover effect to table's tbody odd rows ***/
        table.formatHTML5 tbody tr:nth-child(odd):hover
        {
            cursor:pointer;
            /* add gradient */
            background-color: #808080;
            background: -webkit-gradient(linear, left top, left bottom, from(#606060), to(#909090));
            background: -moz-linear-gradient(top, #606060, #909090);
            color: #dadada;
        }
 
        /*** table's tbody section, even rows style ***/
        table.formatHTML5 tbody tr:nth-child(even) {
            background-color: #efefef;
        }
 
        /*** hover effect to apply to table's tbody section, even rows ***/
        table.formatHTML5 tbody tr:nth-child(even):hover
        {
            cursor:pointer;
            /* add gradient */
            background-color: #808080;
            background: -webkit-gradient(linear, left top, left bottom, from(#606060), to(#909090));
            background: -moz-linear-gradient(top, #606060, #909090);
            color: #dadada;
        }
 
       /*** table's tbody section, last row style ***/
        table.formatHTML5 tbody tr:last-child {
             border-bottom: solid 1px #404040;
        }
 
        /*** table's tbody section, separator row pseudo-class ***/
        table.formatHTML5 tbody tr.separator {
            /* add gradient */
            background-color: #808080;
            background: -webkit-gradient(linear, left top, left bottom, from(#606060), to(#909090));
            background: -moz-linear-gradient(top, #606060, #909090);
            color: #dadada;
        }
 
        /*** table's td element, all section ***/
        table.formatHTML5 td {
           vertical-align:middle;
           padding: 0.5em;
        }
 
        /*** table's tfoot section ***/
        table.formatHTML5 tfoot{
            text-align:center;
            color:#303030;
            text-shadow: 0 1px 1px rgba(255,255,255,0.3);
        }
    </style>
 
</head>

<body>
 
    <!-- CENTTERED COLUMN ON THE PAGE-->
    <div id="divContainer">
 
        <h1>ANNUALIZED INFLATION RATE ON SELECTED PRODUCTS |NYC 2000-2010</h1>
 
        <!-- HTML5 TABLE FORMATTED VIA CSS3-->
        <table class="formatHTML5" >
 
            <!-- TABLE HEADER-->
            <thead>
               <tr><td colspan=3>DISCLAIMER: ALL DATA PROVIDED 'AS IS' FOR DEMO PURPOSE ONLY</td></tr>
                <tr>
                    <th>Product</th><th>Inflation Rate</th><th>Note</th>
                </tr>
            </thead>
 
            <!-- TABLE BODY: MAIN CONTENT-->
            <tbody>
                <tr>
                    <td>Coke® Inflation Index</td><td>7.23%</td><td>Yeah, it's about $2/bottle now</td>
                </tr>
                <tr>
                    <td>Gas Inflation Index</td><td>6.94%</td><td>Such a pain at the pump!</td>
                 </tr>
                <tr>
                    <td>NY subway fare Inflation Index</td><td>4.14%</td><td><a href="http://www.youtube.com/watch?v=Q07Zp7tQBRQ"
                    target="_blank" title="Listen to the music">I want to ride my bicycle (Queens)</a></td>
                </tr>
                <tr>
                    <td>Oil (WTI) Inflation Index estimated</td><td>13.59%</td><td>Wow!</td>
                </tr>
                <tr>
                    <td>Post Stamp Inflation Index</td><td>2.92%</td><td>Email is still free</td>
                </tr>
                <tr>
                    <td>PC RAM (memory) Inflation Index</td><td>-28.34%</td><td>Rejoyce "Intel Inside"!</td>
                </tr>
 
                <!--SEPARATOR ROW USED DIFFERENT STYLE-->
                <tr class="separator">
                    <td colspan="3">Precious metals Price Index: shown for comparison</td>
                </tr>
                <tr>
                    <td>Silver</td><td>20.94%</td><td><a href="http://exm.nr/AuAgPt" target="_blank" title="Read the article online">Element Ag</a></td>
                </tr>
                <tr>
                    <td>Gold</td><td>17.86%</td><td><a href="http://exm.nr/AuAgPt" target="_blank" title="Read the article online">Element Au</a></td>
                </tr>
                <tr>
                    <td>Platinum</td><td>10.98%</td><td><a href="http://exm.nr/AuAgPt" target="_blank" title="Read the article online">Element Pt</a></td>
                </tr>
                <tr>
                    <td>Palladium</td><td>-1.86% </td><td><a href="http://exm.nr/AuAgPt" target="_blank" title="Read the article online">Element Pd</a></td>
                </tr>
            </tbody>
 
            <!-- TABLE FOOTER-->
            <tfoot>
                <tr><td colspan="3">Copyright &#9400 2011 Infosoft International Inc</td></tr>
            </tfoot>
        </table>
    </div>
</body>
</html>