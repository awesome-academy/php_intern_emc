!function (s, u, b, i, z) {
    var r, m;
    s[i] || (s._sbzaccid = z, s[i] = function () {
        s[i].q.push(arguments)
    }, s[i].q = [], s[i]("setAccount", z), r = function (e) {
        return e <= 6 ? 5 : r(e - 1) + r(e - 3)
    }, (m = function (e) {
        var t, n, c;
        5 < e || s._subiz_init_2094850928430 || (t = "https://", t += 0 === e ? "widget." + i + ".xyz" : 1 === e ? "storage.googleapis.com" : "sbz-" + r(10 + e) + ".com", t += "/sbz/app.js?accid=" + z, n = u.createElement(b), c = u.getElementsByTagName(b)[0], n.async = 1, n.src = t, c.parentNode.insertBefore(n, c), setTimeout(m, 2e3, e + 1))
    })(0))
}(window, document, "script", "subiz", "acqtjedmhhueelqrgqht");
