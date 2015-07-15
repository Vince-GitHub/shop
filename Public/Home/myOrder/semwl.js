var scriptstring = "";
var localurl = "";
var localurlsearch = "";
localurl = getReferrer();
try {
    localurlsearch = document.location.search;
} catch (e)
 { }
scriptstring = scriptstring + '<script type="text/javascript" src="http://data.shangpin.com/seo.aspx?s=' + localurl + '" > <\/script>';
if (localurlsearch.indexOf("?") >= 0) {
    var localhref_c_url = "";
    var localhref = getReferrer();
    var localhref_b = /^https?:\/\/(.*?)($|\/.*)/;
    var localhref_c = localhref_b.exec(localhref);
    if (localhref_c != null) {
        localhref_c_url = localhref_c[1];
    }
    scriptstring = scriptstring + '<script type="text/javascript" src="http://data.shangpin.com/sem.aspx' + localurlsearch + '&r=' + localhref_c_url + '" > <\/script>';
}
document.write(scriptstring);

//获取来源地址
function getReferrer() {
    var referrer = '';
    try {
        referrer = window.top.document.referrer;
    } catch (e) {
        if (parent) {
            try {
                referrer = window.parent.document.referrer;
            } catch (e2) {
                referrer = '';
            }
        }
    }
    if (referrer === '') {
        referrer = document.referrer;
        if (!referrer) {
            try {
                if (window.opener && window.opener.location) {
                    referrer = window.opener.location.href
                }
            } catch (e) { referrer = ''; }
        }


    }
    return referrer;
}
		