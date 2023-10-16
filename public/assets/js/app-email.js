"use strict";
document.addEventListener("DOMContentLoaded", function() {
    {
        const r = document.querySelector(".email-list"),
            o = [].slice.call(document.querySelectorAll(".email-list-item")),
            i = [].slice.call(document.querySelectorAll(".email-list-item-input")),
            s = document.querySelector(".app-email-view-content"),
            c = document.querySelector(".email-filters"),
            n = [].slice.call(document.querySelectorAll(".email-filter-folders li")),
            // d = document.querySelector(".email-editor"),
            m = document.querySelector(".app-email-sidebar"),
            u = document.querySelector(".app-overlay"),
            // p = document.querySelector(".email-reply-editor"),
            v = [].slice.call(document.querySelectorAll(".email-list-item-bookmark")),
            g = document.getElementById("email-select-all"),
            h = document.querySelector(".email-search-input"),
            S = document.querySelector(".email-compose-toggle-cc"),
            y = document.querySelector(".email-compose-toggle-bcc"),
            k = document.querySelector(".app-email-compose"),
            b = document.querySelector(".email-list-delete"),
            f = document.querySelector(".email-list-read"),
            L = document.querySelector(".email-list-empty"),
            q = document.querySelector(".email-refresh"),
            E = document.getElementById("app-email-view"),
            w = [].slice.call(document.querySelectorAll(".email-filter-folders li")),
            C = [].slice.call(document.querySelectorAll(".email-list-item-actions li"));
        if (r && new PerfectScrollbar(r, {
                wheelPropagation: !1,
                suppressScrollX: !0
            }), c && new PerfectScrollbar(c, {
                wheelPropagation: !1,
                suppressScrollX: !0
            }), s && new PerfectScrollbar(s, {
                wheelPropagation: !1,
                suppressScrollX: !0
            }), v && v.forEach(e => {
                e.addEventListener("click", e => {
                    var t = e.currentTarget.parentNode.parentNode,
                        l = t.getAttribute("data-starred");
                    e.stopPropagation(), l ? t.removeAttribute("data-starred") : t.setAttribute("data-starred", "true")
                })
            }), g && g.addEventListener("click", e => {
                e.currentTarget.checked ? i.forEach(e => e.checked = 1) : i.forEach(e => e.checked = 0)
            }), i && i.forEach(e => {
                e.addEventListener("click", e => {
                    e.stopPropagation();
                    let t = 0;
                    i.forEach(e => {
                        e.checked && t++
                    }), t < i.length ? 0 == t ? g.indeterminate = !1 : g.indeterminate = !0 : t == i.length ? (g.indeterminate = !1, g.checked = !0) : g.indeterminate = !1
                })
            }), h && h.addEventListener("keyup", e => {
                let l = e.currentTarget.value.toLowerCase(),
                    t = {},
                    a = document.querySelector(".email-filter-folders .active").getAttribute("data-target");
                (t = "inbox" != a ? [].slice.call(document.querySelectorAll(".email-list-item[data-" + a + '="true"]')) : [].slice.call(document.querySelectorAll(".email-list-item"))).forEach(e => {
                    var t = e.textContent.toLowerCase();
                    l ? -1 < t.indexOf(l) ? e.classList.add("d-block") : e.classList.add("d-none") : e.classList.remove("d-none")
                })
            }), n.forEach(e => {
                e.addEventListener("click", e => {
                    let t = e.currentTarget,
                        l = t.getAttribute("data-target");
                    m.classList.remove("show"), u.classList.remove("show"), Helpers._removeClass("active", n), t.classList.add("active"), o.forEach(e => {
                        "inbox" == l || e.hasAttribute("data-" + l) ? (e.classList.add("d-block"), e.classList.remove("d-none")) : (e.classList.add("d-none"), e.classList.remove("d-block"))
                    })
                })
            }), y && y.addEventListener("click", e => {
                Helpers._toggleClass(document.querySelector(".email-compose-bcc"), "d-block", "d-none")
            }), S && S.addEventListener("click", e => {
                Helpers._toggleClass(document.querySelector(".email-compose-cc"), "d-block", "d-none")
            }), k.addEventListener("hidden.bs.modal", e => {
                document.querySelector(".ql-editor").innerHTML = "", $("#emailContacts").val(""), a()
            }), b && b.addEventListener("click", e => {
                i.forEach(e => {
                    e.checked && e.parentNode.closest("li.email-list-item").remove()
                }), g.indeterminate = !1, g.checked = !1, 0 == document.querySelectorAll(".email-list-item").length && L.classList.remove("d-none")
            }), f && f.addEventListener("click", e => {
                i.forEach(e => {
                    e.checked && (e.checked = !1, e.parentNode.closest("li.email-list-item").classList.add("email-marked-read"), e = e.parentNode.closest("li.email-list-item").querySelector(".email-list-item-actions li"), Helpers._hasClass("email-read", e)) && (e.classList.remove("email-read"), e.classList.add("email-unread"), e.querySelector("i").classList.remove("bx-envelope-open"), e.querySelector("i").classList.add("bx-envelope"))
                }), g.indeterminate = !1, g.checked = !1
            }), q && r) {
            let t = $(".email-list"),
                l = new PerfectScrollbar(r, {
                    wheelPropagation: !1,
                    suppressScrollX: !0
                });
            q.addEventListener("click", e => {
                t.block({
                    message: '<div class="spinner-border text-primary" role="status"></div>',
                    timeout: 1e3,
                    css: {
                        backgroundColor: "transparent",
                        border: "0"
                    },
                    overlayCSS: {
                        backgroundColor: "#000",
                        opacity: .1
                    },
                    onBlock: function() {
                        l.settings.suppressScrollY = !0
                    },
                    onUnblock: function() {
                        l.settings.suppressScrollY = !1
                    }
                })
            })
        }
        var l = $(".email-earlier-msgs");
        l.length && l.on("click", function() {
            var e = $(this);
            e.parents().find(".email-card-last").addClass("hide-pseudo"), e.next(".email-card-prev").slideToggle(), e.remove()
        });
        let t = $("#emailContacts");

        function a() {
            function e(e) {
                return e.id ? "<div class='d-flex flex-wrap align-items-center'><div class='avatar avatar-xs me-2 w-px-20 h-px-20'></div>" + e.text + "</div>" : e.text
            }
            t.length && t.wrap('<div class="position-relative"></div>').select2({
                placeholder: "Select value",
                dropdownParent: t.parent(),
                closeOnSelect: !1,
                templateResult: e,
                templateSelection: e,
                escapeMarkup: function(e) {
                    return e
                }
            })
        }
        a();
        let e = $(".app-email-view-content");
        e.find(".scroll-to-reply").on("click", function() {
            0 === e[0].scrollTop && e.animate({
                scrollTop: e[0].scrollHeight
            }, 1500)
        }), w && w.forEach(e => {
            e.addEventListener("click", e => {
                E.classList.remove("show")
            })
        }), C && C.forEach(e => {
            e.addEventListener("click", e => {
                e.stopPropagation();
                e = e.currentTarget;
                Helpers._hasClass("email-delete", e) ? (e.parentNode.closest("li.email-list-item").remove(), 0 == document.querySelectorAll(".email-list-item").length && L.classList.remove("d-none")) : Helpers._hasClass("email-read", e) ? (e.parentNode.closest("li.email-list-item").classList.add("email-marked-read"), Helpers._toggleClass(e, "email-read", "email-unread"), Helpers._toggleClass(e.querySelector("i"), "bx-envelope-open", "bx-envelope")) : Helpers._hasClass("email-unread", e) && (e.parentNode.closest("li.email-list-item").classList.remove("email-marked-read"), Helpers._toggleClass(e, "email-read", "email-unread"), Helpers._toggleClass(e.querySelector("i"), "bx-envelope-open", "bx-envelope"))
            })
        })
    }
});
