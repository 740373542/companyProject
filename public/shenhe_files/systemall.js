/*
 * jQuery JavaScript Library v1.3.2
 *
 * Copyright (c) 2009 John Resig, http://jquery.com/
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * Date: 2009-02-19 17:34:21 -0500 (Thu, 19 Feb 2009)
 * Revision: 6246
 */
(function() {
	var l = this, g, y = l.jQuery, p = l.$, o = l.jQuery = l.$ = function(E, F) {
		return new o.fn.init(E, F)
	}, D = /^[^<]*(<(.|\s)+>)[^>]*$|^#([\w-]+)$/, f = /^.[^:#\[\.,]*$/;
	o.fn = o.prototype = {
		init : function(E, H) {
			E = E || document;
			if (E.nodeType) {
				this[0] = E;
				this.length = 1;
				this.context = E;
				return this
			}
			if (typeof E === "string") {
				var G = D.exec(E);
				if (G && (G[1] || !H)) {
					if (G[1]) {
						E = o.clean([G[1]], H)
					} else {
						var I = document.getElementById(G[3]);
						if (I && I.id != G[3]) {
							return o().find(E)
						}
						var F = o(I || []);
						F.context = document;
						F.selector = E;
						return F
					}
				} else {
					return o(H).find(E)
				}
			} else {
				if (o.isFunction(E)) {
					return o(document).ready(E)
				}
			}
			if (E.selector && E.context) {
				this.selector = E.selector;
				this.context = E.context
			}
			return this.setArray(o.isArray(E) ? E : o.makeArray(E))
		},
		selector : "",
		jquery : "1.3.2",
		size : function() {
			return this.length
		},
		get : function(E) {
			return E === g ? Array.prototype.slice.call(this) : this[E]
		},
		pushStack : function(F, H, E) {
			var G = o(F);
			G.prevObject = this;
			G.context = this.context;
			if (H === "find") {
				G.selector = this.selector + (this.selector ? " " : "") + E
			} else {
				if (H) {
					G.selector = this.selector + "." + H + "(" + E + ")"
				}
			}
			return G
		},
		setArray : function(E) {
			this.length = 0;
			Array.prototype.push.apply(this, E);
			return this
		},
		each : function(F, E) {
			return o.each(this, F, E)
		},
		index : function(E) {
			return o.inArray(E && E.jquery ? E[0] : E, this)
		},
		attr : function(F, H, G) {
			var E = F;
			if (typeof F === "string") {
				if (H === g) {
					return this[0] && o[G || "attr"](this[0], F)
				} else {
					E = {};
					E[F] = H
				}
			}
			return this.each(function(I) {
				for (F in E) {
					o.attr(G ? this.style : this, F, o.prop(this, E[F], G, I, F))
				}
			})
		},
		css : function(E, F) {
			if ((E == "width" || E == "height") && parseFloat(F) < 0) {
				F = g
			}
			return this.attr(E, F, "curCSS")
		},
		text : function(F) {
			if (typeof F !== "object" && F != null) {
				return this.empty().append((this[0] && this[0].ownerDocument || document).createTextNode(F))
			}
			var E = "";
			o.each(F || this, function() {
				o.each(this.childNodes, function() {
					if (this.nodeType != 8) {
						E += this.nodeType != 1 ? this.nodeValue : o.fn.text([this])
					}
				})
			});
			return E
		},
		wrapAll : function(E) {
			if (this[0]) {
				var F = o(E, this[0].ownerDocument).clone();
				if (this[0].parentNode) {
					F.insertBefore(this[0])
				}
				F.map(function() {
					var G = this;
					while (G.firstChild) {
						G = G.firstChild
					}
					return G
				}).append(this)
			}
			return this
		},
		wrapInner : function(E) {
			return this.each(function() {
				o(this).contents().wrapAll(E)
			})
		},
		wrap : function(E) {
			return this.each(function() {
				o(this).wrapAll(E)
			})
		},
		append : function() {
			return this.domManip(arguments, true, function(E) {
				if (this.nodeType == 1) {
					this.appendChild(E)
				}
			})
		},
		prepend : function() {
			return this.domManip(arguments, true, function(E) {
				if (this.nodeType == 1) {
					this.insertBefore(E, this.firstChild)
				}
			})
		},
		before : function() {
			return this.domManip(arguments, false, function(E) {
				this.parentNode.insertBefore(E, this)
			})
		},
		after : function() {
			return this.domManip(arguments, false, function(E) {
				this.parentNode.insertBefore(E, this.nextSibling)
			})
		},
		end : function() {
			return this.prevObject || o([])
		},
		push : [].push,
		sort : [].sort,
		splice : [].splice,
		find : function(E) {
			if (this.length === 1) {
				var F = this.pushStack([], "find", E);
				F.length = 0;
				o.find(E, this[0], F);
				return F
			} else {
				return this.pushStack(o.unique(o.map(this, function(G) {
					return o.find(E, G)
				})), "find", E)
			}
		},
		clone : function(G) {
			var E = this.map(function() {
				if (!o.support.noCloneEvent && !o.isXMLDoc(this)) {
					var I = this.outerHTML;
					if (!I) {
						var J = this.ownerDocument.createElement("div");
						J.appendChild(this.cloneNode(true));
						I = J.innerHTML
					}
					return o.clean([I.replace(/ jQuery\d+="(?:\d+|null)"/g, "").replace(/^\s*/, "")])[0]
				} else {
					return this.cloneNode(true)
				}
			});
			if (G === true) {
				var H = this.find("*").andSelf(), F = 0;
				E.find("*").andSelf().each(function() {
					if (this.nodeName !== H[F].nodeName) {
						return
					}
					var I = o.data(H[F], "events");
					for ( var K in I) {
						for ( var J in I[K]) {
							o.event.add(this, K, I[K][J], I[K][J].data)
						}
					}
					F++
				})
			}
			return E
		},
		filter : function(E) {
			return this.pushStack(o.isFunction(E) && o.grep(this, function(G, F) {
				return E.call(G, F)
			}) || o.multiFilter(E, o.grep(this, function(F) {
				return F.nodeType === 1
			})), "filter", E)
		},
		closest : function(E) {
			var G = o.expr.match.POS.test(E) ? o(E) : null, F = 0;
			return this.map(function() {
				var H = this;
				while (H && H.ownerDocument) {
					if (G ? G.index(H) > -1 : o(H).is(E)) {
						o.data(H, "closest", F);
						return H
					}
					H = H.parentNode;
					F++
				}
			})
		},
		not : function(E) {
			if (typeof E === "string") {
				if (f.test(E)) {
					return this.pushStack(o.multiFilter(E, this, true), "not", E)
				} else {
					E = o.multiFilter(E, this)
				}
			}
			var F = E.length && E[E.length - 1] !== g && !E.nodeType;
			return this.filter(function() {
				return F ? o.inArray(this, E) < 0 : this != E
			})
		},
		add : function(E) {
			return this.pushStack(o.unique(o.merge(this.get(), typeof E === "string" ? o(E) : o.makeArray(E))))
		},
		is : function(E) {
			return !!E && o.multiFilter(E, this).length > 0
		},
		hasClass : function(E) {
			return !!E && this.is("." + E)
		},
		val : function(K) {
			if (K === g) {
				var E = this[0];
				if (E) {
					if (o.nodeName(E, "option")) {
						return (E.attributes.value || {}).specified ? E.value : E.text
					}
					if (o.nodeName(E, "select")) {
						var I = E.selectedIndex, L = [], M = E.options, H = E.type == "select-one";
						if (I < 0) {
							return null
						}
						for (var F = H ? I : 0, J = H ? I + 1 : M.length; F < J; F++) {
							var G = M[F];
							if (G.selected) {
								K = o(G).val();
								if (H) {
									return K
								}
								L.push(K)
							}
						}
						return L
					}
					return (E.value || "").replace(/\r/g, "")
				}
				return g
			}
			if (typeof K === "number") {
				K += ""
			}
			return this.each(function() {
				if (this.nodeType != 1) {
					return
				}
				if (o.isArray(K) && /radio|checkbox/.test(this.type)) {
					this.checked = (o.inArray(this.value, K) >= 0 || o.inArray(this.name, K) >= 0)
				} else {
					if (o.nodeName(this, "select")) {
						var N = o.makeArray(K);
						o("option", this).each(function() {
							this.selected = (o.inArray(this.value, N) >= 0 || o.inArray(this.text, N) >= 0)
						});
						if (!N.length) {
							this.selectedIndex = -1
						}
					} else {
						this.value = K
					}
				}
			})
		},
		html : function(E) {
			return E === g ? (this[0] ? this[0].innerHTML.replace(/ jQuery\d+="(?:\d+|null)"/g, "") : null) : this.empty().append(E)
		},
		replaceWith : function(E) {
			return this.after(E).remove()
		},
		eq : function(E) {
			return this.slice(E, +E + 1)
		},
		slice : function() {
			return this.pushStack(Array.prototype.slice.apply(this, arguments), "slice", Array.prototype.slice.call(arguments).join(","))
		},
		map : function(E) {
			return this.pushStack(o.map(this, function(G, F) {
				return E.call(G, F, G)
			}))
		},
		andSelf : function() {
			return this.add(this.prevObject)
		},
		domManip : function(J, M, L) {
			if (this[0]) {
				var I = (this[0].ownerDocument || this[0]).createDocumentFragment(), F = o.clean(J, (this[0].ownerDocument || this[0]), I), H = I.firstChild;
				if (H) {
					for (var G = 0, E = this.length; G < E; G++) {
						L.call(K(this[G], H), this.length > 1 || G > 0 ? I.cloneNode(true) : I)
					}
				}
				if (F) {
					o.each(F, z)
				}
			}
			return this;
			function K(N, O) {
				return M && o.nodeName(N, "table") && o.nodeName(O, "tr") ? (N.getElementsByTagName("tbody")[0] || N.appendChild(N.ownerDocument
						.createElement("tbody"))) : N
			}
		}
	};
	o.fn.init.prototype = o.fn;
	function z(E, F) {
		if (F.src) {
			o.ajax({
				url : F.src,
				async : false,
				dataType : "script"
			})
		} else {
			o.globalEval(F.text || F.textContent || F.innerHTML || "")
		}
		if (F.parentNode) {
			F.parentNode.removeChild(F)
		}
	}
	function e() {
		return +new Date
	}
	o.extend = o.fn.extend = function() {
		var J = arguments[0] || {}, H = 1, I = arguments.length, E = false, G;
		if (typeof J === "boolean") {
			E = J;
			J = arguments[1] || {};
			H = 2
		}
		if (typeof J !== "object" && !o.isFunction(J)) {
			J = {}
		}
		if (I == H) {
			J = this;
			--H
		}
		for (; H < I; H++) {
			if ((G = arguments[H]) != null) {
				for ( var F in G) {
					var K = J[F], L = G[F];
					if (J === L) {
						continue
					}
					if (E && L && typeof L === "object" && !L.nodeType) {
						J[F] = o.extend(E, K || (L.length != null ? [] : {}), L)
					} else {
						if (L !== g) {
							J[F] = L
						}
					}
				}
			}
		}
		return J
	};
	var b = /z-?index|font-?weight|opacity|zoom|line-?height/i, q = document.defaultView || {}, s = Object.prototype.toString;
	o.extend({
		noConflict : function(E) {
			l.$ = p;
			if (E) {
				l.jQuery = y
			}
			return o
		},
		isFunction : function(E) {
			return s.call(E) === "[object Function]"
		},
		isArray : function(E) {
			return s.call(E) === "[object Array]"
		},
		isXMLDoc : function(E) {
			return E.nodeType === 9 && E.documentElement.nodeName !== "HTML" || !!E.ownerDocument && o.isXMLDoc(E.ownerDocument)
		},
		globalEval : function(G) {
			if (G && /\S/.test(G)) {
				var F = document.getElementsByTagName("head")[0] || document.documentElement, E = document.createElement("script");
				E.type = "text/javascript";
				if (o.support.scriptEval) {
					E.appendChild(document.createTextNode(G))
				} else {
					E.text = G
				}
				F.insertBefore(E, F.firstChild);
				F.removeChild(E)
			}
		},
		nodeName : function(F, E) {
			return F.nodeName && F.nodeName.toUpperCase() == E.toUpperCase()
		},
		each : function(G, K, F) {
			var E, H = 0, I = G.length;
			if (F) {
				if (I === g) {
					for (E in G) {
						if (K.apply(G[E], F) === false) {
							break
						}
					}
				} else {
					for (; H < I;) {
						if (K.apply(G[H++], F) === false) {
							break
						}
					}
				}
			} else {
				if (I === g) {
					for (E in G) {
						if (K.call(G[E], E, G[E]) === false) {
							break
						}
					}
				} else {
					for (var J = G[0]; H < I && K.call(J, H, J) !== false; J = G[++H]) {
					}
				}
			}
			return G
		},
		prop : function(H, I, G, F, E) {
			if (o.isFunction(I)) {
				I = I.call(H, F)
			}
			return typeof I === "number" && G == "curCSS" && !b.test(E) ? I + "px" : I
		},
		className : {
			add : function(E, F) {
				o.each((F || "").split(/\s+/), function(G, H) {
					if (E.nodeType == 1 && !o.className.has(E.className, H)) {
						E.className += (E.className ? " " : "") + H
					}
				})
			},
			remove : function(E, F) {
				if (E.nodeType == 1) {
					E.className = F !== g ? o.grep(E.className.split(/\s+/), function(G) {
						return !o.className.has(F, G)
					}).join(" ") : ""
				}
			},
			has : function(F, E) {
				return F && o.inArray(E, (F.className || F).toString().split(/\s+/)) > -1
			}
		},
		swap : function(H, G, I) {
			var E = {};
			for ( var F in G) {
				E[F] = H.style[F];
				H.style[F] = G[F]
			}
			I.call(H);
			for ( var F in G) {
				H.style[F] = E[F]
			}
		},
		css : function(H, F, J, E) {
			if (F == "width" || F == "height") {
				var L, G = {
					position : "absolute",
					visibility : "hidden",
					display : "block"
				}, K = F == "width" ? ["Left", "Right"] : ["Top", "Bottom"];
				function I() {
					L = F == "width" ? H.offsetWidth : H.offsetHeight;
					if (E === "border") {
						return
					}
					o.each(K, function() {
						if (!E) {
							L -= parseFloat(o.curCSS(H, "padding" + this, true)) || 0
						}
						if (E === "margin") {
							L += parseFloat(o.curCSS(H, "margin" + this, true)) || 0
						} else {
							L -= parseFloat(o.curCSS(H, "border" + this + "Width", true)) || 0
						}
					})
				}
				if (H.offsetWidth !== 0) {
					I()
				} else {
					o.swap(H, G, I)
				}
				return Math.max(0, Math.round(L))
			}
			return o.curCSS(H, F, J)
		},
		curCSS : function(I, F, G) {
			var L, E = I.style;
			if (F == "opacity" && !o.support.opacity) {
				L = o.attr(E, "opacity");
				return L == "" ? "1" : L
			}
			if (F.match(/float/i)) {
				F = w
			}
			if (!G && E && E[F]) {
				L = E[F]
			} else {
				if (q.getComputedStyle) {
					if (F.match(/float/i)) {
						F = "float"
					}
					F = F.replace(/([A-Z])/g, "-$1").toLowerCase();
					var M = q.getComputedStyle(I, null);
					if (M) {
						L = M.getPropertyValue(F)
					}
					if (F == "opacity" && L == "") {
						L = "1"
					}
				} else {
					if (I.currentStyle) {
						var J = F.replace(/\-(\w)/g, function(N, O) {
							return O.toUpperCase()
						});
						L = I.currentStyle[F] || I.currentStyle[J];
						if (!/^\d+(px)?$/i.test(L) && /^\d/.test(L)) {
							var H = E.left, K = I.runtimeStyle.left;
							I.runtimeStyle.left = I.currentStyle.left;
							E.left = L || 0;
							L = E.pixelLeft + "px";
							E.left = H;
							I.runtimeStyle.left = K
						}
					}
				}
			}
			return L
		},
		clean : function(F, K, I) {
			K = K || document;
			if (typeof K.createElement === "undefined") {
				K = K.ownerDocument || K[0] && K[0].ownerDocument || document
			}
			if (!I && F.length === 1 && typeof F[0] === "string") {
				var H = /^<(\w+)\s*\/?>$/.exec(F[0]);
				if (H) {
					return [K.createElement(H[1])]
				}
			}
			var G = [], E = [], L = K.createElement("div");
			o.each(F, function(P, S) {
				if (typeof S === "number") {
					S += ""
				}
				if (!S) {
					return
				}
				if (typeof S === "string") {
					S = S.replace(/(<(\w+)[^>]*?)\/>/g, function(U, V, T) {
						return T.match(/^(abbr|br|col|img|input|link|meta|param|hr|area|embed)$/i) ? U : V + "></" + T + ">"
					});
					var O = S.replace(/^\s+/, "").substring(0, 10).toLowerCase();
					var Q = !O.indexOf("<opt") && [1, "<select multiple='multiple'>", "</select>"] || !O.indexOf("<leg") && [1, "<fieldset>", "</fieldset>"]
							|| O.match(/^<(thead|tbody|tfoot|colg|cap)/) && [1, "<table>", "</table>"] || !O.indexOf("<tr")
							&& [2, "<table><tbody>", "</tbody></table>"] || (!O.indexOf("<td") || !O.indexOf("<th"))
							&& [3, "<table><tbody><tr>", "</tr></tbody></table>"] || !O.indexOf("<col")
							&& [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"] || !o.support.htmlSerialize && [1, "div<div>", "</div>"]
							|| [0, "", ""];
					L.innerHTML = Q[1] + S + Q[2];
					while (Q[0]--) {
						L = L.lastChild
					}
					if (!o.support.tbody) {
						var R = /<tbody/i.test(S), N = !O.indexOf("<table") && !R ? L.firstChild && L.firstChild.childNodes : Q[1] == "<table>" && !R
								? L.childNodes
								: [];
						for (var M = N.length - 1; M >= 0; --M) {
							if (o.nodeName(N[M], "tbody") && !N[M].childNodes.length) {
								N[M].parentNode.removeChild(N[M])
							}
						}
					}
					if (!o.support.leadingWhitespace && /^\s/.test(S)) {
						L.insertBefore(K.createTextNode(S.match(/^\s*/)[0]), L.firstChild)
					}
					S = o.makeArray(L.childNodes)
				}
				if (S.nodeType) {
					G.push(S)
				} else {
					G = o.merge(G, S)
				}
			});
			if (I) {
				for (var J = 0; G[J]; J++) {
					if (o.nodeName(G[J], "script") && (!G[J].type || G[J].type.toLowerCase() === "text/javascript")) {
						E.push(G[J].parentNode ? G[J].parentNode.removeChild(G[J]) : G[J])
					} else {
						if (G[J].nodeType === 1) {
							G.splice.apply(G, [J + 1, 0].concat(o.makeArray(G[J].getElementsByTagName("script"))))
						}
						I.appendChild(G[J])
					}
				}
				return E
			}
			return G
		},
		attr : function(J, G, K) {
			if (!J || J.nodeType == 3 || J.nodeType == 8) {
				return g
			}
			var H = !o.isXMLDoc(J), L = K !== g;
			G = H && o.props[G] || G;
			if (J.tagName) {
				var F = /href|src|style/.test(G);
				if (G == "selected" && J.parentNode) {
					J.parentNode.selectedIndex
				}
				if (G in J && H && !F) {
					if (L) {
						if (G == "type" && o.nodeName(J, "input") && J.parentNode) {
							throw "type property can't be changed"
						}
						J[G] = K
					}
					if (o.nodeName(J, "form") && J.getAttributeNode(G)) {
						return J.getAttributeNode(G).nodeValue
					}
					if (G == "tabIndex") {
						var I = J.getAttributeNode("tabIndex");
						return I && I.specified ? I.value : J.nodeName.match(/(button|input|object|select|textarea)/i) ? 0 : J.nodeName.match(/^(a|area)$/i)
								&& J.href ? 0 : g
					}
					return J[G]
				}
				if (!o.support.style && H && G == "style") {
					return o.attr(J.style, "cssText", K)
				}
				if (L) {
					J.setAttribute(G, "" + K)
				}
				var E = !o.support.hrefNormalized && H && F ? J.getAttribute(G, 2) : J.getAttribute(G);
				return E === null ? g : E
			}
			if (!o.support.opacity && G == "opacity") {
				if (L) {
					J.zoom = 1;
					J.filter = (J.filter || "").replace(/alpha\([^)]*\)/, "") + (parseInt(K) + "" == "NaN" ? "" : "alpha(opacity=" + K * 100 + ")")
				}
				return J.filter && J.filter.indexOf("opacity=") >= 0 ? (parseFloat(J.filter.match(/opacity=([^)]*)/)[1]) / 100) + "" : ""
			}
			G = G.replace(/-([a-z])/ig, function(M, N) {
				return N.toUpperCase()
			});
			if (L) {
				J[G] = K
			}
			return J[G]
		},
		trim : function(E) {
			return (E || "").replace(/^\s+|\s+$/g, "")
		},
		makeArray : function(G) {
			var E = [];
			if (G != null) {
				var F = G.length;
				if (F == null || typeof G === "string" || o.isFunction(G) || G.setInterval) {
					E[0] = G
				} else {
					while (F) {
						E[--F] = G[F]
					}
				}
			}
			return E
		},
		inArray : function(G, H) {
			for (var E = 0, F = H.length; E < F; E++) {
				if (H[E] === G) {
					return E
				}
			}
			return -1
		},
		merge : function(H, E) {
			var F = 0, G, I = H.length;
			if (!o.support.getAll) {
				while ((G = E[F++]) != null) {
					if (G.nodeType != 8) {
						H[I++] = G
					}
				}
			} else {
				while ((G = E[F++]) != null) {
					H[I++] = G
				}
			}
			return H
		},
		unique : function(K) {
			var F = [], E = {};
			try {
				for (var G = 0, H = K.length; G < H; G++) {
					var J = o.data(K[G]);
					if (!E[J]) {
						E[J] = true;
						F.push(K[G])
					}
				}
			} catch (I) {
				F = K
			}
			return F
		},
		grep : function(F, J, E) {
			var G = [];
			for (var H = 0, I = F.length; H < I; H++) {
				if (!E != !J(F[H], H)) {
					G.push(F[H])
				}
			}
			return G
		},
		map : function(E, J) {
			var F = [];
			for (var G = 0, H = E.length; G < H; G++) {
				var I = J(E[G], G);
				if (I != null) {
					F[F.length] = I
				}
			}
			return F.concat.apply([], F)
		}
	});
	var C = navigator.userAgent.toLowerCase();
	o.browser = {
		version : (C.match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/) || [0, "0"])[1],
		safari : /webkit/.test(C),
		opera : /opera/.test(C),
		msie : /msie/.test(C) && !/opera/.test(C),
		mozilla : /mozilla/.test(C) && !/(compatible|webkit)/.test(C)
	};
	o.each({
		parent : function(E) {
			return E.parentNode
		},
		parents : function(E) {
			return o.dir(E, "parentNode")
		},
		next : function(E) {
			return o.nth(E, 2, "nextSibling")
		},
		prev : function(E) {
			return o.nth(E, 2, "previousSibling")
		},
		nextAll : function(E) {
			return o.dir(E, "nextSibling")
		},
		prevAll : function(E) {
			return o.dir(E, "previousSibling")
		},
		siblings : function(E) {
			return o.sibling(E.parentNode.firstChild, E)
		},
		children : function(E) {
			return o.sibling(E.firstChild)
		},
		contents : function(E) {
			return o.nodeName(E, "iframe") ? E.contentDocument || E.contentWindow.document : o.makeArray(E.childNodes)
		}
	}, function(E, F) {
		o.fn[E] = function(G) {
			var H = o.map(this, F);
			if (G && typeof G == "string") {
				H = o.multiFilter(G, H)
			}
			return this.pushStack(o.unique(H), E, G)
		}
	});
	o.each({
		appendTo : "append",
		prependTo : "prepend",
		insertBefore : "before",
		insertAfter : "after",
		replaceAll : "replaceWith"
	}, function(E, F) {
		o.fn[E] = function(G) {
			var J = [], L = o(G);
			for (var K = 0, H = L.length; K < H; K++) {
				var I = (K > 0 ? this.clone(true) : this).get();
				o.fn[F].apply(o(L[K]), I);
				J = J.concat(I)
			}
			return this.pushStack(J, E, G)
		}
	});
	o.each({
		removeAttr : function(E) {
			o.attr(this, E, "");
			if (this.nodeType == 1) {
				this.removeAttribute(E)
			}
		},
		addClass : function(E) {
			o.className.add(this, E)
		},
		removeClass : function(E) {
			o.className.remove(this, E)
		},
		toggleClass : function(F, E) {
			if (typeof E !== "boolean") {
				E = !o.className.has(this, F)
			}
			o.className[E ? "add" : "remove"](this, F)
		},
		remove : function(E) {
			if (!E || o.filter(E, [this]).length) {
				o("*", this).add([this]).each(function() {
					o.event.remove(this);
					o.removeData(this)
				});
				if (this.parentNode) {
					this.parentNode.removeChild(this)
				}
			}
		},
		empty : function() {
			o(this).children().remove();
			while (this.firstChild) {
				this.removeChild(this.firstChild)
			}
		}
	}, function(E, F) {
		o.fn[E] = function() {
			return this.each(F, arguments)
		}
	});
	function j(E, F) {
		return E[0] && parseInt(o.curCSS(E[0], F, true), 10) || 0
	}
	var h = "jQuery" + e(), v = 0, A = {};
	o.extend({
		cache : {},
		data : function(F, E, G) {
			F = F == l ? A : F;
			var H = F[h];
			if (!H) {
				H = F[h] = ++v
			}
			if (E && !o.cache[H]) {
				o.cache[H] = {}
			}
			if (G !== g) {
				o.cache[H][E] = G
			}
			return E ? o.cache[H][E] : H
		},
		removeData : function(F, E) {
			F = F == l ? A : F;
			var H = F[h];
			if (E) {
				if (o.cache[H]) {
					delete o.cache[H][E];
					E = "";
					for (E in o.cache[H]) {
						break
					}
					if (!E) {
						o.removeData(F)
					}
				}
			} else {
				try {
					delete F[h]
				} catch (G) {
					if (F.removeAttribute) {
						F.removeAttribute(h)
					}
				}
				delete o.cache[H]
			}
		},
		queue : function(F, E, H) {
			if (F) {
				E = (E || "fx") + "queue";
				var G = o.data(F, E);
				if (!G || o.isArray(H)) {
					G = o.data(F, E, o.makeArray(H))
				} else {
					if (H) {
						G.push(H)
					}
				}
			}
			return G
		},
		dequeue : function(H, G) {
			var E = o.queue(H, G), F = E.shift();
			if (!G || G === "fx") {
				F = E[0]
			}
			if (F !== g) {
				F.call(H)
			}
		}
	});
	o.fn.extend({
		data : function(E, G) {
			var H = E.split(".");
			H[1] = H[1] ? "." + H[1] : "";
			if (G === g) {
				var F = this.triggerHandler("getData" + H[1] + "!", [H[0]]);
				if (F === g && this.length) {
					F = o.data(this[0], E)
				}
				return F === g && H[1] ? this.data(H[0]) : F
			} else {
				return this.trigger("setData" + H[1] + "!", [H[0], G]).each(function() {
					o.data(this, E, G)
				})
			}
		},
		removeData : function(E) {
			return this.each(function() {
				o.removeData(this, E)
			})
		},
		queue : function(E, F) {
			if (typeof E !== "string") {
				F = E;
				E = "fx"
			}
			if (F === g) {
				return o.queue(this[0], E)
			}
			return this.each(function() {
				var G = o.queue(this, E, F);
				if (E == "fx" && G.length == 1) {
					G[0].call(this)
				}
			})
		},
		dequeue : function(E) {
			return this.each(function() {
				o.dequeue(this, E)
			})
		}
	});
	/*
	 * Sizzle CSS Selector Engine - v0.9.3 Copyright 2009, The Dojo Foundation
	 * More information: http://sizzlejs.com/
	 * 
	 * Permission is hereby granted, free of charge, to any person obtaining a
	 * copy of this software and associated documentation files (the
	 * "Software"), to deal in the Software without restriction, including
	 * without limitation the rights to use, copy, modify, merge, publish,
	 * distribute, sublicense, and/or sell copies of the Software, and to permit
	 * persons to whom the Software is furnished to do so, subject to the
	 * following conditions:
	 * 
	 * The above copyright notice and this permission notice shall be included
	 * in all copies or substantial portions of the Software.
	 * 
	 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
	 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
	 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN
	 * NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
	 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
	 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE
	 * USE OR OTHER DEALINGS IN THE SOFTWARE.
	 * 
	 */
	(function() {
		var R = /((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^[\]]*\]|['"][^'"]*['"]|[^[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?/g, L = 0, H = Object.prototype.toString;
		var F = function(Y, U, ab, ac) {
			ab = ab || [];
			U = U || document;
			if (U.nodeType !== 1 && U.nodeType !== 9) {
				return []
			}
			if (!Y || typeof Y !== "string") {
				return ab
			}
			var Z = [], W, af, ai, T, ad, V, X = true;
			R.lastIndex = 0;
			while ((W = R.exec(Y)) !== null) {
				Z.push(W[1]);
				if (W[2]) {
					V = RegExp.rightContext;
					break
				}
			}
			if (Z.length > 1 && M.exec(Y)) {
				if (Z.length === 2 && I.relative[Z[0]]) {
					af = J(Z[0] + Z[1], U)
				} else {
					af = I.relative[Z[0]] ? [U] : F(Z.shift(), U);
					while (Z.length) {
						Y = Z.shift();
						if (I.relative[Y]) {
							Y += Z.shift()
						}
						af = J(Y, af)
					}
				}
			} else {
				var ae = ac ? {
					expr : Z.pop(),
					set : E(ac)
				} : F.find(Z.pop(), Z.length === 1 && U.parentNode ? U.parentNode : U, Q(U));
				af = F.filter(ae.expr, ae.set);
				if (Z.length > 0) {
					ai = E(af)
				} else {
					X = false
				}
				while (Z.length) {
					var ah = Z.pop(), ag = ah;
					if (!I.relative[ah]) {
						ah = ""
					} else {
						ag = Z.pop()
					}
					if (ag == null) {
						ag = U
					}
					I.relative[ah](ai, ag, Q(U))
				}
			}
			if (!ai) {
				ai = af
			}
			if (!ai) {
				throw "Syntax error, unrecognized expression: " + (ah || Y)
			}
			if (H.call(ai) === "[object Array]") {
				if (!X) {
					ab.push.apply(ab, ai)
				} else {
					if (U.nodeType === 1) {
						for (var aa = 0; ai[aa] != null; aa++) {
							if (ai[aa] && (ai[aa] === true || ai[aa].nodeType === 1 && K(U, ai[aa]))) {
								ab.push(af[aa])
							}
						}
					} else {
						for (var aa = 0; ai[aa] != null; aa++) {
							if (ai[aa] && ai[aa].nodeType === 1) {
								ab.push(af[aa])
							}
						}
					}
				}
			} else {
				E(ai, ab)
			}
			if (V) {
				F(V, U, ab, ac);
				if (G) {
					hasDuplicate = false;
					ab.sort(G);
					if (hasDuplicate) {
						for (var aa = 1; aa < ab.length; aa++) {
							if (ab[aa] === ab[aa - 1]) {
								ab.splice(aa--, 1)
							}
						}
					}
				}
			}
			return ab
		};
		F.matches = function(T, U) {
			return F(T, null, null, U)
		};
		F.find = function(aa, T, ab) {
			var Z, X;
			if (!aa) {
				return []
			}
			for (var W = 0, V = I.order.length; W < V; W++) {
				var Y = I.order[W], X;
				if ((X = I.match[Y].exec(aa))) {
					var U = RegExp.leftContext;
					if (U.substr(U.length - 1) !== "\\") {
						X[1] = (X[1] || "").replace(/\\/g, "");
						Z = I.find[Y](X, T, ab);
						if (Z != null) {
							aa = aa.replace(I.match[Y], "");
							break
						}
					}
				}
			}
			if (!Z) {
				Z = T.getElementsByTagName("*")
			}
			return {
				set : Z,
				expr : aa
			}
		};
		F.filter = function(ad, ac, ag, W) {
			var V = ad, ai = [], aa = ac, Y, T, Z = ac && ac[0] && Q(ac[0]);
			while (ad && ac.length) {
				for ( var ab in I.filter) {
					if ((Y = I.match[ab].exec(ad)) != null) {
						var U = I.filter[ab], ah, af;
						T = false;
						if (aa == ai) {
							ai = []
						}
						if (I.preFilter[ab]) {
							Y = I.preFilter[ab](Y, aa, ag, ai, W, Z);
							if (!Y) {
								T = ah = true
							} else {
								if (Y === true) {
									continue
								}
							}
						}
						if (Y) {
							for (var X = 0; (af = aa[X]) != null; X++) {
								if (af) {
									ah = U(af, Y, X, aa);
									var ae = W ^ !!ah;
									if (ag && ah != null) {
										if (ae) {
											T = true
										} else {
											aa[X] = false
										}
									} else {
										if (ae) {
											ai.push(af);
											T = true
										}
									}
								}
							}
						}
						if (ah !== g) {
							if (!ag) {
								aa = ai
							}
							ad = ad.replace(I.match[ab], "");
							if (!T) {
								return []
							}
							break
						}
					}
				}
				if (ad == V) {
					if (T == null) {
						throw "Syntax error, unrecognized expression: " + ad
					} else {
						break
					}
				}
				V = ad
			}
			return aa
		};
		var I = F.selectors = {
			order : ["ID", "NAME", "TAG"],
			match : {
				ID : /#((?:[\w\u00c0-\uFFFF_-]|\\.)+)/,
				CLASS : /\.((?:[\w\u00c0-\uFFFF_-]|\\.)+)/,
				NAME : /\[name=['"]*((?:[\w\u00c0-\uFFFF_-]|\\.)+)['"]*\]/,
				ATTR : /\[\s*((?:[\w\u00c0-\uFFFF_-]|\\.)+)\s*(?:(\S?=)\s*(['"]*)(.*?)\3|)\s*\]/,
				TAG : /^((?:[\w\u00c0-\uFFFF\*_-]|\\.)+)/,
				CHILD : /:(only|nth|last|first)-child(?:\((even|odd|[\dn+-]*)\))?/,
				POS : /:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^-]|$)/,
				PSEUDO : /:((?:[\w\u00c0-\uFFFF_-]|\\.)+)(?:\((['"]*)((?:\([^\)]+\)|[^\2\(\)]*)+)\2\))?/
			},
			attrMap : {
				"class" : "className",
				"for" : "htmlFor"
			},
			attrHandle : {
				href : function(T) {
					return T.getAttribute("href")
				}
			},
			relative : {
				"+" : function(aa, T, Z) {
					var X = typeof T === "string", ab = X && !/\W/.test(T), Y = X && !ab;
					if (ab && !Z) {
						T = T.toUpperCase()
					}
					for (var W = 0, V = aa.length, U; W < V; W++) {
						if ((U = aa[W])) {
							while ((U = U.previousSibling) && U.nodeType !== 1) {
							}
							aa[W] = Y || U && U.nodeName === T ? U || false : U === T
						}
					}
					if (Y) {
						F.filter(T, aa, true)
					}
				},
				">" : function(Z, U, aa) {
					var X = typeof U === "string";
					if (X && !/\W/.test(U)) {
						U = aa ? U : U.toUpperCase();
						for (var V = 0, T = Z.length; V < T; V++) {
							var Y = Z[V];
							if (Y) {
								var W = Y.parentNode;
								Z[V] = W.nodeName === U ? W : false
							}
						}
					} else {
						for (var V = 0, T = Z.length; V < T; V++) {
							var Y = Z[V];
							if (Y) {
								Z[V] = X ? Y.parentNode : Y.parentNode === U
							}
						}
						if (X) {
							F.filter(U, Z, true)
						}
					}
				},
				"" : function(W, U, Y) {
					var V = L++, T = S;
					if (!U.match(/\W/)) {
						var X = U = Y ? U : U.toUpperCase();
						T = P
					}
					T("parentNode", U, V, W, X, Y)
				},
				"~" : function(W, U, Y) {
					var V = L++, T = S;
					if (typeof U === "string" && !U.match(/\W/)) {
						var X = U = Y ? U : U.toUpperCase();
						T = P
					}
					T("previousSibling", U, V, W, X, Y)
				}
			},
			find : {
				ID : function(U, V, W) {
					if (typeof V.getElementById !== "undefined" && !W) {
						var T = V.getElementById(U[1]);
						return T ? [T] : []
					}
				},
				NAME : function(V, Y, Z) {
					if (typeof Y.getElementsByName !== "undefined") {
						var U = [], X = Y.getElementsByName(V[1]);
						for (var W = 0, T = X.length; W < T; W++) {
							if (X[W].getAttribute("name") === V[1]) {
								U.push(X[W])
							}
						}
						return U.length === 0 ? null : U
					}
				},
				TAG : function(T, U) {
					return U.getElementsByTagName(T[1])
				}
			},
			preFilter : {
				CLASS : function(W, U, V, T, Z, aa) {
					W = " " + W[1].replace(/\\/g, "") + " ";
					if (aa) {
						return W
					}
					for (var X = 0, Y; (Y = U[X]) != null; X++) {
						if (Y) {
							if (Z ^ (Y.className && (" " + Y.className + " ").indexOf(W) >= 0)) {
								if (!V) {
									T.push(Y)
								}
							} else {
								if (V) {
									U[X] = false
								}
							}
						}
					}
					return false
				},
				ID : function(T) {
					return T[1].replace(/\\/g, "")
				},
				TAG : function(U, T) {
					for (var V = 0; T[V] === false; V++) {
					}
					return T[V] && Q(T[V]) ? U[1] : U[1].toUpperCase()
				},
				CHILD : function(T) {
					if (T[1] == "nth") {
						var U = /(-?)(\d*)n((?:\+|-)?\d*)/.exec(T[2] == "even" && "2n" || T[2] == "odd" && "2n+1" || !/\D/.test(T[2]) && "0n+" + T[2] || T[2]);
						T[2] = (U[1] + (U[2] || 1)) - 0;
						T[3] = U[3] - 0
					}
					T[0] = L++;
					return T
				},
				ATTR : function(X, U, V, T, Y, Z) {
					var W = X[1].replace(/\\/g, "");
					if (!Z && I.attrMap[W]) {
						X[1] = I.attrMap[W]
					}
					if (X[2] === "~=") {
						X[4] = " " + X[4] + " "
					}
					return X
				},
				PSEUDO : function(X, U, V, T, Y) {
					if (X[1] === "not") {
						if (X[3].match(R).length > 1 || /^\w/.test(X[3])) {
							X[3] = F(X[3], null, null, U)
						} else {
							var W = F.filter(X[3], U, V, true ^ Y);
							if (!V) {
								T.push.apply(T, W)
							}
							return false
						}
					} else {
						if (I.match.POS.test(X[0]) || I.match.CHILD.test(X[0])) {
							return true
						}
					}
					return X
				},
				POS : function(T) {
					T.unshift(true);
					return T
				}
			},
			filters : {
				enabled : function(T) {
					return T.disabled === false && T.type !== "hidden"
				},
				disabled : function(T) {
					return T.disabled === true
				},
				checked : function(T) {
					return T.checked === true
				},
				selected : function(T) {
					T.parentNode.selectedIndex;
					return T.selected === true
				},
				parent : function(T) {
					return !!T.firstChild
				},
				empty : function(T) {
					return !T.firstChild
				},
				has : function(V, U, T) {
					return !!F(T[3], V).length
				},
				header : function(T) {
					return /h\d/i.test(T.nodeName)
				},
				text : function(T) {
					return "text" === T.type
				},
				radio : function(T) {
					return "radio" === T.type
				},
				checkbox : function(T) {
					return "checkbox" === T.type
				},
				file : function(T) {
					return "file" === T.type
				},
				password : function(T) {
					return "password" === T.type
				},
				submit : function(T) {
					return "submit" === T.type
				},
				image : function(T) {
					return "image" === T.type
				},
				reset : function(T) {
					return "reset" === T.type
				},
				button : function(T) {
					return "button" === T.type || T.nodeName.toUpperCase() === "BUTTON"
				},
				input : function(T) {
					return /input|select|textarea|button/i.test(T.nodeName)
				}
			},
			setFilters : {
				first : function(U, T) {
					return T === 0
				},
				last : function(V, U, T, W) {
					return U === W.length - 1
				},
				even : function(U, T) {
					return T % 2 === 0
				},
				odd : function(U, T) {
					return T % 2 === 1
				},
				lt : function(V, U, T) {
					return U < T[3] - 0
				},
				gt : function(V, U, T) {
					return U > T[3] - 0
				},
				nth : function(V, U, T) {
					return T[3] - 0 == U
				},
				eq : function(V, U, T) {
					return T[3] - 0 == U
				}
			},
			filter : {
				PSEUDO : function(Z, V, W, aa) {
					var U = V[1], X = I.filters[U];
					if (X) {
						return X(Z, W, V, aa)
					} else {
						if (U === "contains") {
							return (Z.textContent || Z.innerText || "").indexOf(V[3]) >= 0
						} else {
							if (U === "not") {
								var Y = V[3];
								for (var W = 0, T = Y.length; W < T; W++) {
									if (Y[W] === Z) {
										return false
									}
								}
								return true
							}
						}
					}
				},
				CHILD : function(T, W) {
					var Z = W[1], U = T;
					switch (Z) {
						case "only" :
						case "first" :
							while (U = U.previousSibling) {
								if (U.nodeType === 1) {
									return false
								}
							}
							if (Z == "first") {
								return true
							}
							U = T;
						case "last" :
							while (U = U.nextSibling) {
								if (U.nodeType === 1) {
									return false
								}
							}
							return true;
						case "nth" :
							var V = W[2], ac = W[3];
							if (V == 1 && ac == 0) {
								return true
							}
							var Y = W[0], ab = T.parentNode;
							if (ab && (ab.sizcache !== Y || !T.nodeIndex)) {
								var X = 0;
								for (U = ab.firstChild; U; U = U.nextSibling) {
									if (U.nodeType === 1) {
										U.nodeIndex = ++X
									}
								}
								ab.sizcache = Y
							}
							var aa = T.nodeIndex - ac;
							if (V == 0) {
								return aa == 0
							} else {
								return (aa % V == 0 && aa / V >= 0)
							}
					}
				},
				ID : function(U, T) {
					return U.nodeType === 1 && U.getAttribute("id") === T
				},
				TAG : function(U, T) {
					return (T === "*" && U.nodeType === 1) || U.nodeName === T
				},
				CLASS : function(U, T) {
					return (" " + (U.className || U.getAttribute("class")) + " ").indexOf(T) > -1
				},
				ATTR : function(Y, W) {
					var V = W[1], T = I.attrHandle[V] ? I.attrHandle[V](Y) : Y[V] != null ? Y[V] : Y.getAttribute(V), Z = T + "", X = W[2], U = W[4];
					return T == null ? X === "!=" : X === "=" ? Z === U : X === "*=" ? Z.indexOf(U) >= 0 : X === "~=" ? (" " + Z + " ").indexOf(U) >= 0 : !U
							? Z && T !== false
							: X === "!=" ? Z != U : X === "^=" ? Z.indexOf(U) === 0 : X === "$=" ? Z.substr(Z.length - U.length) === U : X === "|=" ? Z === U
									|| Z.substr(0, U.length + 1) === U + "-" : false
				},
				POS : function(X, U, V, Y) {
					var T = U[2], W = I.setFilters[T];
					if (W) {
						return W(X, V, U, Y)
					}
				}
			}
		};
		var M = I.match.POS;
		for ( var O in I.match) {
			I.match[O] = RegExp(I.match[O].source + /(?![^\[]*\])(?![^\(]*\))/.source)
		}
		var E = function(U, T) {
			U = Array.prototype.slice.call(U);
			if (T) {
				T.push.apply(T, U);
				return T
			}
			return U
		};
		try {
			Array.prototype.slice.call(document.documentElement.childNodes)
		} catch (N) {
			E = function(X, W) {
				var U = W || [];
				if (H.call(X) === "[object Array]") {
					Array.prototype.push.apply(U, X)
				} else {
					if (typeof X.length === "number") {
						for (var V = 0, T = X.length; V < T; V++) {
							U.push(X[V])
						}
					} else {
						for (var V = 0; X[V]; V++) {
							U.push(X[V])
						}
					}
				}
				return U
			}
		}
		var G;
		if (document.documentElement.compareDocumentPosition) {
			G = function(U, T) {
				var V = U.compareDocumentPosition(T) & 4 ? -1 : U === T ? 0 : 1;
				if (V === 0) {
					hasDuplicate = true
				}
				return V
			}
		} else {
			if ("sourceIndex" in document.documentElement) {
				G = function(U, T) {
					var V = U.sourceIndex - T.sourceIndex;
					if (V === 0) {
						hasDuplicate = true
					}
					return V
				}
			} else {
				if (document.createRange) {
					G = function(W, U) {
						var V = W.ownerDocument.createRange(), T = U.ownerDocument.createRange();
						V.selectNode(W);
						V.collapse(true);
						T.selectNode(U);
						T.collapse(true);
						var X = V.compareBoundaryPoints(Range.START_TO_END, T);
						if (X === 0) {
							hasDuplicate = true
						}
						return X
					}
				}
			}
		}
		(function() {
			var U = document.createElement("form"), V = "script" + (new Date).getTime();
			U.innerHTML = "<input name='" + V + "'/>";
			var T = document.documentElement;
			T.insertBefore(U, T.firstChild);
			if (!!document.getElementById(V)) {
				I.find.ID = function(X, Y, Z) {
					if (typeof Y.getElementById !== "undefined" && !Z) {
						var W = Y.getElementById(X[1]);
						return W ? W.id === X[1] || typeof W.getAttributeNode !== "undefined" && W.getAttributeNode("id").nodeValue === X[1] ? [W] : g : []
					}
				};
				I.filter.ID = function(Y, W) {
					var X = typeof Y.getAttributeNode !== "undefined" && Y.getAttributeNode("id");
					return Y.nodeType === 1 && X && X.nodeValue === W
				}
			}
			T.removeChild(U)
		})();
		(function() {
			var T = document.createElement("div");
			T.appendChild(document.createComment(""));
			if (T.getElementsByTagName("*").length > 0) {
				I.find.TAG = function(U, Y) {
					var X = Y.getElementsByTagName(U[1]);
					if (U[1] === "*") {
						var W = [];
						for (var V = 0; X[V]; V++) {
							if (X[V].nodeType === 1) {
								W.push(X[V])
							}
						}
						X = W
					}
					return X
				}
			}
			T.innerHTML = "<a href='#'></a>";
			if (T.firstChild && typeof T.firstChild.getAttribute !== "undefined" && T.firstChild.getAttribute("href") !== "#") {
				I.attrHandle.href = function(U) {
					return U.getAttribute("href", 2)
				}
			}
		})();
		if (document.querySelectorAll) {
			(function() {
				var T = F, U = document.createElement("div");
				U.innerHTML = "<p class='TEST'></p>";
				if (U.querySelectorAll && U.querySelectorAll(".TEST").length === 0) {
					return
				}
				F = function(Y, X, V, W) {
					X = X || document;
					if (!W && X.nodeType === 9 && !Q(X)) {
						try {
							return E(X.querySelectorAll(Y), V)
						} catch (Z) {
						}
					}
					return T(Y, X, V, W)
				};
				F.find = T.find;
				F.filter = T.filter;
				F.selectors = T.selectors;
				F.matches = T.matches
			})()
		}
		if (document.getElementsByClassName && document.documentElement.getElementsByClassName) {
			(function() {
				var T = document.createElement("div");
				T.innerHTML = "<div class='test e'></div><div class='test'></div>";
				if (T.getElementsByClassName("e").length === 0) {
					return
				}
				T.lastChild.className = "e";
				if (T.getElementsByClassName("e").length === 1) {
					return
				}
				I.order.splice(1, 0, "CLASS");
				I.find.CLASS = function(U, V, W) {
					if (typeof V.getElementsByClassName !== "undefined" && !W) {
						return V.getElementsByClassName(U[1])
					}
				}
			})()
		}
		function P(U, Z, Y, ad, aa, ac) {
			var ab = U == "previousSibling" && !ac;
			for (var W = 0, V = ad.length; W < V; W++) {
				var T = ad[W];
				if (T) {
					if (ab && T.nodeType === 1) {
						T.sizcache = Y;
						T.sizset = W
					}
					T = T[U];
					var X = false;
					while (T) {
						if (T.sizcache === Y) {
							X = ad[T.sizset];
							break
						}
						if (T.nodeType === 1 && !ac) {
							T.sizcache = Y;
							T.sizset = W
						}
						if (T.nodeName === Z) {
							X = T;
							break
						}
						T = T[U]
					}
					ad[W] = X
				}
			}
		}
		function S(U, Z, Y, ad, aa, ac) {
			var ab = U == "previousSibling" && !ac;
			for (var W = 0, V = ad.length; W < V; W++) {
				var T = ad[W];
				if (T) {
					if (ab && T.nodeType === 1) {
						T.sizcache = Y;
						T.sizset = W
					}
					T = T[U];
					var X = false;
					while (T) {
						if (T.sizcache === Y) {
							X = ad[T.sizset];
							break
						}
						if (T.nodeType === 1) {
							if (!ac) {
								T.sizcache = Y;
								T.sizset = W
							}
							if (typeof Z !== "string") {
								if (T === Z) {
									X = true;
									break
								}
							} else {
								if (F.filter(Z, [T]).length > 0) {
									X = T;
									break
								}
							}
						}
						T = T[U]
					}
					ad[W] = X
				}
			}
		}
		var K = document.compareDocumentPosition ? function(U, T) {
			return U.compareDocumentPosition(T) & 16
		} : function(U, T) {
			return U !== T && (U.contains ? U.contains(T) : true)
		};
		var Q = function(T) {
			return T.nodeType === 9 && T.documentElement.nodeName !== "HTML" || !!T.ownerDocument && Q(T.ownerDocument)
		};
		var J = function(T, aa) {
			var W = [], X = "", Y, V = aa.nodeType ? [aa] : aa;
			while ((Y = I.match.PSEUDO.exec(T))) {
				X += Y[0];
				T = T.replace(I.match.PSEUDO, "")
			}
			T = I.relative[T] ? T + "*" : T;
			for (var Z = 0, U = V.length; Z < U; Z++) {
				F(T, V[Z], W)
			}
			return F.filter(X, W)
		};
		o.find = F;
		o.filter = F.filter;
		o.expr = F.selectors;
		o.expr[":"] = o.expr.filters;
		F.selectors.filters.hidden = function(T) {
			return T.offsetWidth === 0 || T.offsetHeight === 0
		};
		F.selectors.filters.visible = function(T) {
			return T.offsetWidth > 0 || T.offsetHeight > 0
		};
		F.selectors.filters.animated = function(T) {
			return o.grep(o.timers, function(U) {
				return T === U.elem
			}).length
		};
		o.multiFilter = function(V, T, U) {
			if (U) {
				V = ":not(" + V + ")"
			}
			return F.matches(V, T)
		};
		o.dir = function(V, U) {
			var T = [], W = V[U];
			while (W && W != document) {
				if (W.nodeType == 1) {
					T.push(W)
				}
				W = W[U]
			}
			return T
		};
		o.nth = function(X, T, V, W) {
			T = T || 1;
			var U = 0;
			for (; X; X = X[V]) {
				if (X.nodeType == 1 && ++U == T) {
					break
				}
			}
			return X
		};
		o.sibling = function(V, U) {
			var T = [];
			for (; V; V = V.nextSibling) {
				if (V.nodeType == 1 && V != U) {
					T.push(V)
				}
			}
			return T
		};
		return;
		l.Sizzle = F
	})();
	o.event = {
		add : function(I, F, H, K) {
			if (I.nodeType == 3 || I.nodeType == 8) {
				return
			}
			if (I.setInterval && I != l) {
				I = l
			}
			if (!H.guid) {
				H.guid = this.guid++
			}
			if (K !== g) {
				var G = H;
				H = this.proxy(G);
				H.data = K
			}
			var E = o.data(I, "events") || o.data(I, "events", {}), J = o.data(I, "handle") || o.data(I, "handle", function() {
				return typeof o !== "undefined" && !o.event.triggered ? o.event.handle.apply(arguments.callee.elem, arguments) : g
			});
			J.elem = I;
			o.each(F.split(/\s+/), function(M, N) {
				var O = N.split(".");
				N = O.shift();
				H.type = O.slice().sort().join(".");
				var L = E[N];
				if (o.event.specialAll[N]) {
					o.event.specialAll[N].setup.call(I, K, O)
				}
				if (!L) {
					L = E[N] = {};
					if (!o.event.special[N] || o.event.special[N].setup.call(I, K, O) === false) {
						if (I.addEventListener) {
							I.addEventListener(N, J, false)
						} else {
							if (I.attachEvent) {
								I.attachEvent("on" + N, J)
							}
						}
					}
				}
				L[H.guid] = H;
				o.event.global[N] = true
			});
			I = null
		},
		guid : 1,
		global : {},
		remove : function(K, H, J) {
			if (K.nodeType == 3 || K.nodeType == 8) {
				return
			}
			var G = o.data(K, "events"), F, E;
			if (G) {
				if (H === g || (typeof H === "string" && H.charAt(0) == ".")) {
					for ( var I in G) {
						this.remove(K, I + (H || ""))
					}
				} else {
					if (H.type) {
						J = H.handler;
						H = H.type
					}
					o.each(H.split(/\s+/), function(M, O) {
						var Q = O.split(".");
						O = Q.shift();
						var N = RegExp("(^|\\.)" + Q.slice().sort().join(".*\\.") + "(\\.|$)");
						if (G[O]) {
							if (J) {
								delete G[O][J.guid]
							} else {
								for ( var P in G[O]) {
									if (N.test(G[O][P].type)) {
										delete G[O][P]
									}
								}
							}
							if (o.event.specialAll[O]) {
								o.event.specialAll[O].teardown.call(K, Q)
							}
							for (F in G[O]) {
								break
							}
							if (!F) {
								if (!o.event.special[O] || o.event.special[O].teardown.call(K, Q) === false) {
									if (K.removeEventListener) {
										K.removeEventListener(O, o.data(K, "handle"), false)
									} else {
										if (K.detachEvent) {
											K.detachEvent("on" + O, o.data(K, "handle"))
										}
									}
								}
								F = null;
								delete G[O]
							}
						}
					})
				}
				for (F in G) {
					break
				}
				if (!F) {
					var L = o.data(K, "handle");
					if (L) {
						L.elem = null
					}
					o.removeData(K, "events");
					o.removeData(K, "handle")
				}
			}
		},
		trigger : function(I, K, H, E) {
			var G = I.type || I;
			if (!E) {
				I = typeof I === "object" ? I[h] ? I : o.extend(o.Event(G), I) : o.Event(G);
				if (G.indexOf("!") >= 0) {
					I.type = G = G.slice(0, -1);
					I.exclusive = true
				}
				if (!H) {
					I.stopPropagation();
					if (this.global[G]) {
						o.each(o.cache, function() {
							if (this.events && this.events[G]) {
								o.event.trigger(I, K, this.handle.elem)
							}
						})
					}
				}
				if (!H || H.nodeType == 3 || H.nodeType == 8) {
					return g
				}
				I.result = g;
				I.target = H;
				K = o.makeArray(K);
				K.unshift(I)
			}
			I.currentTarget = H;
			var J = o.data(H, "handle");
			if (J) {
				J.apply(H, K)
			}
			if ((!H[G] || (o.nodeName(H, "a") && G == "click")) && H["on" + G] && H["on" + G].apply(H, K) === false) {
				I.result = false
			}
			if (!E && H[G] && !I.isDefaultPrevented() && !(o.nodeName(H, "a") && G == "click")) {
				this.triggered = true;
				try {
					H[G]()
				} catch (L) {
				}
			}
			this.triggered = false;
			if (!I.isPropagationStopped()) {
				var F = H.parentNode || H.ownerDocument;
				if (F) {
					o.event.trigger(I, K, F, true)
				}
			}
		},
		handle : function(K) {
			var J, E;
			K = arguments[0] = o.event.fix(K || l.event);
			K.currentTarget = this;
			var L = K.type.split(".");
			K.type = L.shift();
			J = !L.length && !K.exclusive;
			var I = RegExp("(^|\\.)" + L.slice().sort().join(".*\\.") + "(\\.|$)");
			E = (o.data(this, "events") || {})[K.type];
			for ( var G in E) {
				var H = E[G];
				if (J || I.test(H.type)) {
					K.handler = H;
					K.data = H.data;
					var F = H.apply(this, arguments);
					if (F !== g) {
						K.result = F;
						if (F === false) {
							K.preventDefault();
							K.stopPropagation()
						}
					}
					if (K.isImmediatePropagationStopped()) {
						break
					}
				}
			}
		},
		props : "altKey attrChange attrName bubbles button cancelable charCode clientX clientY ctrlKey currentTarget data detail eventPhase fromElement handler keyCode metaKey newValue originalTarget pageX pageY prevValue relatedNode relatedTarget screenX screenY shiftKey srcElement target toElement view wheelDelta which"
				.split(" "),
		fix : function(H) {
			if (H[h]) {
				return H
			}
			var F = H;
			H = o.Event(F);
			for (var G = this.props.length, J; G;) {
				J = this.props[--G];
				H[J] = F[J]
			}
			if (!H.target) {
				H.target = H.srcElement || document
			}
			if (H.target.nodeType == 3) {
				H.target = H.target.parentNode
			}
			if (!H.relatedTarget && H.fromElement) {
				H.relatedTarget = H.fromElement == H.target ? H.toElement : H.fromElement
			}
			if (H.pageX == null && H.clientX != null) {
				var I = document.documentElement, E = document.body;
				H.pageX = H.clientX + (I && I.scrollLeft || E && E.scrollLeft || 0) - (I.clientLeft || 0);
				H.pageY = H.clientY + (I && I.scrollTop || E && E.scrollTop || 0) - (I.clientTop || 0)
			}
			if (!H.which && ((H.charCode || H.charCode === 0) ? H.charCode : H.keyCode)) {
				H.which = H.charCode || H.keyCode
			}
			if (!H.metaKey && H.ctrlKey) {
				H.metaKey = H.ctrlKey
			}
			if (!H.which && H.button) {
				H.which = (H.button & 1 ? 1 : (H.button & 2 ? 3 : (H.button & 4 ? 2 : 0)))
			}
			return H
		},
		proxy : function(F, E) {
			E = E || function() {
				return F.apply(this, arguments)
			};
			E.guid = F.guid = F.guid || E.guid || this.guid++;
			return E
		},
		special : {
			ready : {
				setup : B,
				teardown : function() {
				}
			}
		},
		specialAll : {
			live : {
				setup : function(E, F) {
					o.event.add(this, F[0], c)
				},
				teardown : function(G) {
					if (G.length) {
						var E = 0, F = RegExp("(^|\\.)" + G[0] + "(\\.|$)");
						o.each((o.data(this, "events").live || {}), function() {
							if (F.test(this.type)) {
								E++
							}
						});
						if (E < 1) {
							o.event.remove(this, G[0], c)
						}
					}
				}
			}
		}
	};
	o.Event = function(E) {
		if (!this.preventDefault) {
			return new o.Event(E)
		}
		if (E && E.type) {
			this.originalEvent = E;
			this.type = E.type
		} else {
			this.type = E
		}
		this.timeStamp = e();
		this[h] = true
	};
	function k() {
		return false
	}
	function u() {
		return true
	}
	o.Event.prototype = {
		preventDefault : function() {
			this.isDefaultPrevented = u;
			var E = this.originalEvent;
			if (!E) {
				return
			}
			if (E.preventDefault) {
				E.preventDefault()
			}
			E.returnValue = false
		},
		stopPropagation : function() {
			this.isPropagationStopped = u;
			var E = this.originalEvent;
			if (!E) {
				return
			}
			if (E.stopPropagation) {
				E.stopPropagation()
			}
			E.cancelBubble = true
		},
		stopImmediatePropagation : function() {
			this.isImmediatePropagationStopped = u;
			this.stopPropagation()
		},
		isDefaultPrevented : k,
		isPropagationStopped : k,
		isImmediatePropagationStopped : k
	};
	var a = function(F) {
		var E = F.relatedTarget;
		while (E && E != this) {
			try {
				E = E.parentNode
			} catch (G) {
				E = this
			}
		}
		if (E != this) {
			F.type = F.data;
			o.event.handle.apply(this, arguments)
		}
	};
	o.each({
		mouseover : "mouseenter",
		mouseout : "mouseleave"
	}, function(F, E) {
		o.event.special[E] = {
			setup : function() {
				o.event.add(this, F, a, E)
			},
			teardown : function() {
				o.event.remove(this, F, a)
			}
		}
	});
	o.fn.extend({
		bind : function(F, G, E) {
			return F == "unload" ? this.one(F, G, E) : this.each(function() {
				o.event.add(this, F, E || G, E && G)
			})
		},
		one : function(G, H, F) {
			var E = o.event.proxy(F || H, function(I) {
				o(this).unbind(I, E);
				return (F || H).apply(this, arguments)
			});
			return this.each(function() {
				o.event.add(this, G, E, F && H)
			})
		},
		unbind : function(F, E) {
			return this.each(function() {
				o.event.remove(this, F, E)
			})
		},
		trigger : function(E, F) {
			return this.each(function() {
				o.event.trigger(E, F, this)
			})
		},
		triggerHandler : function(E, G) {
			if (this[0]) {
				var F = o.Event(E);
				F.preventDefault();
				F.stopPropagation();
				o.event.trigger(F, G, this[0]);
				return F.result
			}
		},
		toggle : function(G) {
			var E = arguments, F = 1;
			while (F < E.length) {
				o.event.proxy(G, E[F++])
			}
			return this.click(o.event.proxy(G, function(H) {
				this.lastToggle = (this.lastToggle || 0) % F;
				H.preventDefault();
				return E[this.lastToggle++].apply(this, arguments) || false
			}))
		},
		hover : function(E, F) {
			return this.mouseenter(E).mouseleave(F)
		},
		ready : function(E) {
			B();
			if (o.isReady) {
				E.call(document, o)
			} else {
				o.readyList.push(E)
			}
			return this
		},
		live : function(G, F) {
			var E = o.event.proxy(F);
			E.guid += this.selector + G;
			o(document).bind(i(G, this.selector), this.selector, E);
			return this
		},
		die : function(F, E) {
			o(document).unbind(i(F, this.selector), E ? {
				guid : E.guid + this.selector + F
			} : null);
			return this
		}
	});
	function c(H) {
		var E = RegExp("(^|\\.)" + H.type + "(\\.|$)"), G = true, F = [];
		o.each(o.data(this, "events").live || [], function(I, J) {
			if (E.test(J.type)) {
				var K = o(H.target).closest(J.data)[0];
				if (K) {
					F.push({
						elem : K,
						fn : J
					})
				}
			}
		});
		F.sort(function(J, I) {
			return o.data(J.elem, "closest") - o.data(I.elem, "closest")
		});
		o.each(F, function() {
			if (this.fn.call(this.elem, H, this.fn.data) === false) {
				return (G = false)
			}
		});
		return G
	}
	function i(F, E) {
		return ["live", F, E.replace(/\./g, "`").replace(/ /g, "|")].join(".")
	}
	o.extend({
		isReady : false,
		readyList : [],
		ready : function() {
			if (!o.isReady) {
				o.isReady = true;
				if (o.readyList) {
					o.each(o.readyList, function() {
						this.call(document, o)
					});
					o.readyList = null
				}
				o(document).triggerHandler("ready")
			}
		}
	});
	var x = false;
	function B() {
		if (x) {
			return
		}
		x = true;
		if (document.addEventListener) {
			document.addEventListener("DOMContentLoaded", function() {
				document.removeEventListener("DOMContentLoaded", arguments.callee, false);
				o.ready()
			}, false)
		} else {
			if (document.attachEvent) {
				document.attachEvent("onreadystatechange", function() {
					if (document.readyState === "complete") {
						document.detachEvent("onreadystatechange", arguments.callee);
						o.ready()
					}
				});
				if (document.documentElement.doScroll && l == l.top) {
					(function() {
						if (o.isReady) {
							return
						}
						try {
							document.documentElement.doScroll("left")
						} catch (E) {
							setTimeout(arguments.callee, 0);
							return
						}
						o.ready()
					})()
				}
			}
		}
		o.event.add(l, "load", o.ready)
	}
	o
			.each(
					("blur,focus,load,resize,scroll,unload,click,dblclick,mousedown,mouseup,mousemove,mouseover,mouseout,mouseenter,mouseleave,change,select,submit,keydown,keypress,keyup,error")
							.split(","), function(F, E) {
						o.fn[E] = function(G) {
							return G ? this.bind(E, G) : this.trigger(E)
						}
					});
	o(l).bind("unload", function() {
		for ( var E in o.cache) {
			if (E != 1 && o.cache[E].handle) {
				o.event.remove(o.cache[E].handle.elem)
			}
		}
	});
	(function() {
		o.support = {};
		var F = document.documentElement, G = document.createElement("script"), K = document.createElement("div"), J = "script" + (new Date).getTime();
		K.style.display = "none";
		K.innerHTML = '   <link/><table></table><a href="/a" style="color:red;float:left;opacity:.5;">a</a><select><option>text</option></select><object><param/></object>';
		var H = K.getElementsByTagName("*"), E = K.getElementsByTagName("a")[0];
		if (!H || !H.length || !E) {
			return
		}
		o.support = {
			leadingWhitespace : K.firstChild.nodeType == 3,
			tbody : !K.getElementsByTagName("tbody").length,
			objectAll : !!K.getElementsByTagName("object")[0].getElementsByTagName("*").length,
			htmlSerialize : !!K.getElementsByTagName("link").length,
			style : /red/.test(E.getAttribute("style")),
			hrefNormalized : E.getAttribute("href") === "/a",
			opacity : E.style.opacity === "0.5",
			cssFloat : !!E.style.cssFloat,
			scriptEval : false,
			noCloneEvent : true,
			boxModel : null
		};
		G.type = "text/javascript";
		try {
			G.appendChild(document.createTextNode("window." + J + "=1;"))
		} catch (I) {
		}
		F.insertBefore(G, F.firstChild);
		if (l[J]) {
			o.support.scriptEval = true;
			delete l[J]
		}
		F.removeChild(G);
		if (K.attachEvent && K.fireEvent) {
			K.attachEvent("onclick", function() {
				o.support.noCloneEvent = false;
				K.detachEvent("onclick", arguments.callee)
			});
			K.cloneNode(true).fireEvent("onclick")
		}
		o(function() {
			var L = document.createElement("div");
			L.style.width = L.style.paddingLeft = "1px";
			document.body.appendChild(L);
			o.boxModel = o.support.boxModel = L.offsetWidth === 2;
			document.body.removeChild(L).style.display = "none"
		})
	})();
	var w = o.support.cssFloat ? "cssFloat" : "styleFloat";
	o.props = {
		"for" : "htmlFor",
		"class" : "className",
		"float" : w,
		cssFloat : w,
		styleFloat : w,
		readonly : "readOnly",
		maxlength : "maxLength",
		cellspacing : "cellSpacing",
		rowspan : "rowSpan",
		tabindex : "tabIndex"
	};
	o.fn.extend({
		_load : o.fn.load,
		load : function(G, J, K) {
			if (typeof G !== "string") {
				return this._load(G)
			}
			var I = G.indexOf(" ");
			if (I >= 0) {
				var E = G.slice(I, G.length);
				G = G.slice(0, I)
			}
			var H = "GET";
			if (J) {
				if (o.isFunction(J)) {
					K = J;
					J = null
				} else {
					if (typeof J === "object") {
						J = o.param(J);
						H = "POST"
					}
				}
			}
			var F = this;
			o.ajax({
				url : G,
				type : H,
				dataType : "html",
				data : J,
				complete : function(M, L) {
					if (L == "success" || L == "notmodified") {
						F.html(E ? o("<div/>").append(M.responseText.replace(/<script(.|\s)*?\/script>/g, "")).find(E) : M.responseText)
					}
					if (K) {
						F.each(K, [M.responseText, L, M])
					}
				}
			});
			return this
		},
		serialize : function() {
			return o.param(this.serializeArray())
		},
		serializeArray : function() {
			return this.map(function() {
				return this.elements ? o.makeArray(this.elements) : this
			}).filter(
					function() {
						return this.name && !this.disabled
								&& (this.checked || /select|textarea/i.test(this.nodeName) || /text|hidden|password|search/i.test(this.type))
					}).map(function(E, F) {
				var G = o(this).val();
				return G == null ? null : o.isArray(G) ? o.map(G, function(I, H) {
					return {
						name : F.name,
						value : I
					}
				}) : {
					name : F.name,
					value : G
				}
			}).get()
		}
	});
	o.each("ajaxStart,ajaxStop,ajaxComplete,ajaxError,ajaxSuccess,ajaxSend".split(","), function(E, F) {
		o.fn[F] = function(G) {
			return this.bind(F, G)
		}
	});
	var r = e();
	o.extend({
		get : function(E, G, H, F) {
			if (o.isFunction(G)) {
				H = G;
				G = null
			}
			return o.ajax({
				type : "GET",
				url : E,
				data : G,
				success : H,
				dataType : F
			})
		},
		getScript : function(E, F) {
			return o.get(E, null, F, "script")
		},
		getJSON : function(E, F, G) {
			return o.get(E, F, G, "json")
		},
		post : function(E, G, H, F) {
			if (o.isFunction(G)) {
				H = G;
				G = {}
			}
			return o.ajax({
				type : "POST",
				url : E,
				data : G,
				success : H,
				dataType : F
			})
		},
		ajaxSetup : function(E) {
			o.extend(o.ajaxSettings, E)
		},
		ajaxSettings : {
			url : location.href,
			global : true,
			type : "GET",
			contentType : "application/x-www-form-urlencoded",
			processData : true,
			async : true,
			xhr : function() {
				return l.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest()
			},
			accepts : {
				xml : "application/xml, text/xml",
				html : "text/html",
				script : "text/javascript, application/javascript",
				json : "application/json, text/javascript",
				text : "text/plain",
				_default : "*/*"
			}
		},
		lastModified : {},
		ajax : function(M) {
			M = o.extend(true, M, o.extend(true, {}, o.ajaxSettings, M));
			var W, F = /=\?(&|$)/g, R, V, G = M.type.toUpperCase();
			if (M.data && M.processData && typeof M.data !== "string") {
				M.data = o.param(M.data)
			}
			if (M.dataType == "jsonp") {
				if (G == "GET") {
					if (!M.url.match(F)) {
						M.url += (M.url.match(/\?/) ? "&" : "?") + (M.jsonp || "callback") + "=?"
					}
				} else {
					if (!M.data || !M.data.match(F)) {
						M.data = (M.data ? M.data + "&" : "") + (M.jsonp || "callback") + "=?"
					}
				}
				M.dataType = "json"
			}
			if (M.dataType == "json" && (M.data && M.data.match(F) || M.url.match(F))) {
				W = "jsonp" + r++;
				if (M.data) {
					M.data = (M.data + "").replace(F, "=" + W + "$1")
				}
				M.url = M.url.replace(F, "=" + W + "$1");
				M.dataType = "script";
				l[W] = function(X) {
					V = X;
					I();
					L();
					l[W] = g;
					try {
						delete l[W]
					} catch (Y) {
					}
					if (H) {
						H.removeChild(T)
					}
				}
			}
			if (M.dataType == "script" && M.cache == null) {
				M.cache = false
			}
			if (M.cache === false && G == "GET") {
				var E = e();
				var U = M.url.replace(/(\?|&)_=.*?(&|$)/, "$1_=" + E + "$2");
				M.url = U + ((U == M.url) ? (M.url.match(/\?/) ? "&" : "?") + "_=" + E : "")
			}
			if (M.data && G == "GET") {
				M.url += (M.url.match(/\?/) ? "&" : "?") + M.data;
				M.data = null
			}
			if (M.global && !o.active++) {
				o.event.trigger("ajaxStart")
			}
			var Q = /^(\w+:)?\/\/([^\/?#]+)/.exec(M.url);
			if (M.dataType == "script" && G == "GET" && Q && (Q[1] && Q[1] != location.protocol || Q[2] != location.host)) {
				var H = document.getElementsByTagName("head")[0];
				var T = document.createElement("script");
				T.src = M.url;
				if (M.scriptCharset) {
					T.charset = M.scriptCharset
				}
				if (!W) {
					var O = false;
					T.onload = T.onreadystatechange = function() {
						if (!O && (!this.readyState || this.readyState == "loaded" || this.readyState == "complete")) {
							O = true;
							I();
							L();
							T.onload = T.onreadystatechange = null;
							H.removeChild(T)
						}
					}
				}
				H.appendChild(T);
				return g
			}
			var K = false;
			var J = M.xhr();
			if (M.username) {
				J.open(G, M.url, M.async, M.username, M.password)
			} else {
				J.open(G, M.url, M.async)
			}
			try {
				if (M.data) {
					J.setRequestHeader("Content-Type", M.contentType)
				}
				if (M.ifModified) {
					J.setRequestHeader("If-Modified-Since", o.lastModified[M.url] || "Thu, 01 Jan 1970 00:00:00 GMT")
				}
				J.setRequestHeader("X-Requested-With", "XMLHttpRequest");
				J.setRequestHeader("Accept", M.dataType && M.accepts[M.dataType] ? M.accepts[M.dataType] + ", */*" : M.accepts._default)
			} catch (S) {
			}
			if (M.beforeSend && M.beforeSend(J, M) === false) {
				if (M.global && !--o.active) {
					o.event.trigger("ajaxStop")
				}
				J.abort();
				return false
			}
			if (M.global) {
				o.event.trigger("ajaxSend", [J, M])
			}
			var N = function(X) {
				if (J.readyState == 0) {
					if (P) {
						clearInterval(P);
						P = null;
						if (M.global && !--o.active) {
							o.event.trigger("ajaxStop")
						}
					}
				} else {
					if (!K && J && (J.readyState == 4 || X == "timeout")) {
						K = true;
						if (P) {
							clearInterval(P);
							P = null
						}
						R = X == "timeout" ? "timeout" : !o.httpSuccess(J) ? "error" : M.ifModified && o.httpNotModified(J, M.url) ? "notmodified" : "success";
						if (R == "success") {
							try {
								V = o.httpData(J, M.dataType, M)
							} catch (Z) {
								R = "parsererror"
							}
						}
						if (R == "success") {
							var Y;
							try {
								Y = J.getResponseHeader("Last-Modified")
							} catch (Z) {
							}
							if (M.ifModified && Y) {
								o.lastModified[M.url] = Y
							}
							if (!W) {
								I()
							}
						} else {
							o.handleError(M, J, R)
						}
						L();
						if (X) {
							J.abort()
						}
						if (M.async) {
							J = null
						}
					}
				}
			};
			if (M.async) {
				var P = setInterval(N, 13);
				if (M.timeout > 0) {
					setTimeout(function() {
						if (J && !K) {
							N("timeout")
						}
					}, M.timeout)
				}
			}
			try {
				J.send(M.data)
			} catch (S) {
				o.handleError(M, J, null, S)
			}
			if (!M.async) {
				N()
			}
			function I() {
				if (M.success) {
					M.success(V, R)
				}
				if (M.global) {
					o.event.trigger("ajaxSuccess", [J, M])
				}
			}
			function L() {
				if (M.complete) {
					M.complete(J, R)
				}
				if (M.global) {
					o.event.trigger("ajaxComplete", [J, M])
				}
				if (M.global && !--o.active) {
					o.event.trigger("ajaxStop")
				}
			}
			return J
		},
		handleError : function(F, H, E, G) {
			if (F.error) {
				F.error(H, E, G)
			}
			if (F.global) {
				o.event.trigger("ajaxError", [H, F, G])
			}
		},
		active : 0,
		httpSuccess : function(F) {
			try {
				return !F.status && location.protocol == "file:" || (F.status >= 200 && F.status < 300) || F.status == 304 || F.status == 1223
			} catch (E) {
			}
			return false
		},
		httpNotModified : function(G, E) {
			try {
				var H = G.getResponseHeader("Last-Modified");
				return G.status == 304 || H == o.lastModified[E]
			} catch (F) {
			}
			return false
		},
		httpData : function(J, H, G) {
			var F = J.getResponseHeader("content-type"), E = H == "xml" || !H && F && F.indexOf("xml") >= 0, I = E ? J.responseXML : J.responseText;
			if (E && I.documentElement.tagName == "parsererror") {
				throw "parsererror"
			}
			if (G && G.dataFilter) {
				I = G.dataFilter(I, H)
			}
			if (typeof I === "string") {
				if (H == "script") {
					o.globalEval(I)
				}
				if (H == "json") {
					I = l["eval"]("(" + I + ")")
				}
			}
			return I
		},
		param : function(E) {
			var G = [];
			function H(I, J) {
				G[G.length] = encodeURIComponent(I) + "=" + encodeURIComponent(J)
			}
			if (o.isArray(E) || E.jquery) {
				o.each(E, function() {
					H(this.name, this.value)
				})
			} else {
				for ( var F in E) {
					if (o.isArray(E[F])) {
						o.each(E[F], function() {
							H(F, this)
						})
					} else {
						H(F, o.isFunction(E[F]) ? E[F]() : E[F])
					}
				}
			}
			return G.join("&").replace(/%20/g, "+")
		}
	});
	var m = {}, n, d = [["height", "marginTop", "marginBottom", "paddingTop", "paddingBottom"],
			["width", "marginLeft", "marginRight", "paddingLeft", "paddingRight"], ["opacity"]];
	function t(F, E) {
		var G = {};
		o.each(d.concat.apply([], d.slice(0, E)), function() {
			G[this] = F
		});
		return G
	}
	o.fn.extend({
		show : function(J, L) {
			if (J) {
				return this.animate(t("show", 3), J, L)
			} else {
				for (var H = 0, F = this.length; H < F; H++) {
					var E = o.data(this[H], "olddisplay");
					this[H].style.display = E || "";
					if (o.css(this[H], "display") === "none") {
						var G = this[H].tagName, K;
						if (m[G]) {
							K = m[G]
						} else {
							var I = o("<" + G + " />").appendTo("body");
							K = I.css("display");
							if (K === "none") {
								K = "block"
							}
							I.remove();
							m[G] = K
						}
						o.data(this[H], "olddisplay", K)
					}
				}
				for (var H = 0, F = this.length; H < F; H++) {
					this[H].style.display = o.data(this[H], "olddisplay") || ""
				}
				return this
			}
		},
		hide : function(H, I) {
			if (H) {
				return this.animate(t("hide", 3), H, I)
			} else {
				for (var G = 0, F = this.length; G < F; G++) {
					var E = o.data(this[G], "olddisplay");
					if (!E && E !== "none") {
						o.data(this[G], "olddisplay", o.css(this[G], "display"))
					}
				}
				for (var G = 0, F = this.length; G < F; G++) {
					this[G].style.display = "none"
				}
				return this
			}
		},
		_toggle : o.fn.toggle,
		toggle : function(G, F) {
			var E = typeof G === "boolean";
			return o.isFunction(G) && o.isFunction(F) ? this._toggle.apply(this, arguments) : G == null || E ? this.each(function() {
				var H = E ? G : o(this).is(":hidden");
				o(this)[H ? "show" : "hide"]()
			}) : this.animate(t("toggle", 3), G, F)
		},
		fadeTo : function(E, G, F) {
			return this.animate({
				opacity : G
			}, E, F)
		},
		animate : function(I, F, H, G) {
			var E = o.speed(F, H, G);
			return this[E.queue === false ? "each" : "queue"](function() {
				var K = o.extend({}, E), M, L = this.nodeType == 1 && o(this).is(":hidden"), J = this;
				for (M in I) {
					if (I[M] == "hide" && L || I[M] == "show" && !L) {
						return K.complete.call(this)
					}
					if ((M == "height" || M == "width") && this.style) {
						K.display = o.css(this, "display");
						K.overflow = this.style.overflow
					}
				}
				if (K.overflow != null) {
					this.style.overflow = "hidden"
				}
				K.curAnim = o.extend({}, I);
				o.each(I, function(O, S) {
					var R = new o.fx(J, K, O);
					if (/toggle|show|hide/.test(S)) {
						R[S == "toggle" ? L ? "show" : "hide" : S](I)
					} else {
						var Q = S.toString().match(/^([+-]=)?([\d+-.]+)(.*)$/), T = R.cur(true) || 0;
						if (Q) {
							var N = parseFloat(Q[2]), P = Q[3] || "px";
							if (P != "px") {
								J.style[O] = (N || 1) + P;
								T = ((N || 1) / R.cur(true)) * T;
								J.style[O] = T + P
							}
							if (Q[1]) {
								N = ((Q[1] == "-=" ? -1 : 1) * N) + T
							}
							R.custom(T, N, P)
						} else {
							R.custom(T, S, "")
						}
					}
				});
				return true
			})
		},
		stop : function(F, E) {
			var G = o.timers;
			if (F) {
				this.queue([])
			}
			this.each(function() {
				for (var H = G.length - 1; H >= 0; H--) {
					if (G[H].elem == this) {
						if (E) {
							G[H](true)
						}
						G.splice(H, 1)
					}
				}
			});
			if (!E) {
				this.dequeue()
			}
			return this
		}
	});
	o.each({
		slideDown : t("show", 1),
		slideUp : t("hide", 1),
		slideToggle : t("toggle", 1),
		fadeIn : {
			opacity : "show"
		},
		fadeOut : {
			opacity : "hide"
		}
	}, function(E, F) {
		o.fn[E] = function(G, H) {
			return this.animate(F, G, H)
		}
	});
	o.extend({
		speed : function(G, H, F) {
			var E = typeof G === "object" ? G : {
				complete : F || !F && H || o.isFunction(G) && G,
				duration : G,
				easing : F && H || H && !o.isFunction(H) && H
			};
			E.duration = o.fx.off ? 0 : typeof E.duration === "number" ? E.duration : o.fx.speeds[E.duration] || o.fx.speeds._default;
			E.old = E.complete;
			E.complete = function() {
				if (E.queue !== false) {
					o(this).dequeue()
				}
				if (o.isFunction(E.old)) {
					E.old.call(this)
				}
			};
			return E
		},
		easing : {
			linear : function(G, H, E, F) {
				return E + F * G
			},
			swing : function(G, H, E, F) {
				return ((-Math.cos(G * Math.PI) / 2) + 0.5) * F + E
			}
		},
		timers : [],
		fx : function(F, E, G) {
			this.options = E;
			this.elem = F;
			this.prop = G;
			if (!E.orig) {
				E.orig = {}
			}
		}
	});
	o.fx.prototype = {
		update : function() {
			if (this.options.step) {
				this.options.step.call(this.elem, this.now, this)
			}
			(o.fx.step[this.prop] || o.fx.step._default)(this);
			if ((this.prop == "height" || this.prop == "width") && this.elem.style) {
				this.elem.style.display = "block"
			}
		},
		cur : function(F) {
			if (this.elem[this.prop] != null && (!this.elem.style || this.elem.style[this.prop] == null)) {
				return this.elem[this.prop]
			}
			var E = parseFloat(o.css(this.elem, this.prop, F));
			return E && E > -10000 ? E : parseFloat(o.curCSS(this.elem, this.prop)) || 0
		},
		custom : function(I, H, G) {
			this.startTime = e();
			this.start = I;
			this.end = H;
			this.unit = G || this.unit || "px";
			this.now = this.start;
			this.pos = this.state = 0;
			var E = this;
			function F(J) {
				return E.step(J)
			}
			F.elem = this.elem;
			if (F() && o.timers.push(F) && !n) {
				n = setInterval(function() {
					var K = o.timers;
					for (var J = 0; J < K.length; J++) {
						if (!K[J]()) {
							K.splice(J--, 1)
						}
					}
					if (!K.length) {
						clearInterval(n);
						n = g
					}
				}, 13)
			}
		},
		show : function() {
			this.options.orig[this.prop] = o.attr(this.elem.style, this.prop);
			this.options.show = true;
			this.custom(this.prop == "width" || this.prop == "height" ? 1 : 0, this.cur());
			o(this.elem).show()
		},
		hide : function() {
			this.options.orig[this.prop] = o.attr(this.elem.style, this.prop);
			this.options.hide = true;
			this.custom(this.cur(), 0)
		},
		step : function(H) {
			var G = e();
			if (H || G >= this.options.duration + this.startTime) {
				this.now = this.end;
				this.pos = this.state = 1;
				this.update();
				this.options.curAnim[this.prop] = true;
				var E = true;
				for ( var F in this.options.curAnim) {
					if (this.options.curAnim[F] !== true) {
						E = false
					}
				}
				if (E) {
					if (this.options.display != null) {
						this.elem.style.overflow = this.options.overflow;
						this.elem.style.display = this.options.display;
						if (o.css(this.elem, "display") == "none") {
							this.elem.style.display = "block"
						}
					}
					if (this.options.hide) {
						o(this.elem).hide()
					}
					if (this.options.hide || this.options.show) {
						for ( var I in this.options.curAnim) {
							o.attr(this.elem.style, I, this.options.orig[I])
						}
					}
					this.options.complete.call(this.elem)
				}
				return false
			} else {
				var J = G - this.startTime;
				this.state = J / this.options.duration;
				this.pos = o.easing[this.options.easing || (o.easing.swing ? "swing" : "linear")](this.state, J, 0, 1, this.options.duration);
				this.now = this.start + ((this.end - this.start) * this.pos);
				this.update()
			}
			return true
		}
	};
	o.extend(o.fx, {
		speeds : {
			slow : 600,
			fast : 200,
			_default : 400
		},
		step : {
			opacity : function(E) {
				o.attr(E.elem.style, "opacity", E.now)
			},
			_default : function(E) {
				if (E.elem.style && E.elem.style[E.prop] != null) {
					E.elem.style[E.prop] = E.now + E.unit
				} else {
					E.elem[E.prop] = E.now
				}
			}
		}
	});
	if (document.documentElement.getBoundingClientRect) {
		o.fn.offset = function() {
			if (!this[0]) {
				return {
					top : 0,
					left : 0
				}
			}
			if (this[0] === this[0].ownerDocument.body) {
				return o.offset.bodyOffset(this[0])
			}
			var G = this[0].getBoundingClientRect(), J = this[0].ownerDocument, F = J.body, E = J.documentElement, L = E.clientTop || F.clientTop || 0, K = E.clientLeft
					|| F.clientLeft || 0, I = G.top + (self.pageYOffset || o.boxModel && E.scrollTop || F.scrollTop) - L, H = G.left
					+ (self.pageXOffset || o.boxModel && E.scrollLeft || F.scrollLeft) - K;
			return {
				top : I,
				left : H
			}
		}
	} else {
		o.fn.offset = function() {
			if (!this[0]) {
				return {
					top : 0,
					left : 0
				}
			}
			if (this[0] === this[0].ownerDocument.body) {
				return o.offset.bodyOffset(this[0])
			}
			o.offset.initialized || o.offset.initialize();
			var J = this[0], G = J.offsetParent, F = J, O = J.ownerDocument, M, H = O.documentElement, K = O.body, L = O.defaultView, E = L.getComputedStyle(J,
					null), N = J.offsetTop, I = J.offsetLeft;
			while ((J = J.parentNode) && J !== K && J !== H) {
				M = L.getComputedStyle(J, null);
				N -= J.scrollTop, I -= J.scrollLeft;
				if (J === G) {
					N += J.offsetTop, I += J.offsetLeft;
					if (o.offset.doesNotAddBorder && !(o.offset.doesAddBorderForTableAndCells && /^t(able|d|h)$/i.test(J.tagName))) {
						N += parseInt(M.borderTopWidth, 10) || 0, I += parseInt(M.borderLeftWidth, 10) || 0
					}
					F = G, G = J.offsetParent
				}
				if (o.offset.subtractsBorderForOverflowNotVisible && M.overflow !== "visible") {
					N += parseInt(M.borderTopWidth, 10) || 0, I += parseInt(M.borderLeftWidth, 10) || 0
				}
				E = M
			}
			if (E.position === "relative" || E.position === "static") {
				N += K.offsetTop, I += K.offsetLeft
			}
			if (E.position === "fixed") {
				N += Math.max(H.scrollTop, K.scrollTop), I += Math.max(H.scrollLeft, K.scrollLeft)
			}
			return {
				top : N,
				left : I
			}
		}
	}
	o.offset = {
		initialize : function() {
			if (this.initialized) {
				return
			}
			var L = document.body, F = document.createElement("div"), H, G, N, I, M, E, J = L.style.marginTop, K = '<div style="position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;"><div></div></div><table style="position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;" cellpadding="0" cellspacing="0"><tr><td></td></tr></table>';
			M = {
				position : "absolute",
				top : 0,
				left : 0,
				margin : 0,
				border : 0,
				width : "1px",
				height : "1px",
				visibility : "hidden"
			};
			for (E in M) {
				F.style[E] = M[E]
			}
			F.innerHTML = K;
			L.insertBefore(F, L.firstChild);
			H = F.firstChild, G = H.firstChild, I = H.nextSibling.firstChild.firstChild;
			this.doesNotAddBorder = (G.offsetTop !== 5);
			this.doesAddBorderForTableAndCells = (I.offsetTop === 5);
			H.style.overflow = "hidden", H.style.position = "relative";
			this.subtractsBorderForOverflowNotVisible = (G.offsetTop === -5);
			L.style.marginTop = "1px";
			this.doesNotIncludeMarginInBodyOffset = (L.offsetTop === 0);
			L.style.marginTop = J;
			L.removeChild(F);
			this.initialized = true
		},
		bodyOffset : function(E) {
			o.offset.initialized || o.offset.initialize();
			var G = E.offsetTop, F = E.offsetLeft;
			if (o.offset.doesNotIncludeMarginInBodyOffset) {
				G += parseInt(o.curCSS(E, "marginTop", true), 10) || 0, F += parseInt(o.curCSS(E, "marginLeft", true), 10) || 0
			}
			return {
				top : G,
				left : F
			}
		}
	};
	o.fn.extend({
		position : function() {
			var I = 0, H = 0, F;
			if (this[0]) {
				var G = this.offsetParent(), J = this.offset(), E = /^body|html$/i.test(G[0].tagName) ? {
					top : 0,
					left : 0
				} : G.offset();
				J.top -= j(this, "marginTop");
				J.left -= j(this, "marginLeft");
				E.top += j(G, "borderTopWidth");
				E.left += j(G, "borderLeftWidth");
				F = {
					top : J.top - E.top,
					left : J.left - E.left
				}
			}
			return F
		},
		offsetParent : function() {
			var E = this[0].offsetParent || document.body;
			while (E && (!/^body|html$/i.test(E.tagName) && o.css(E, "position") == "static")) {
				E = E.offsetParent
			}
			return o(E)
		}
	});
	o.each(["Left", "Top"], function(F, E) {
		var G = "scroll" + E;
		o.fn[G] = function(H) {
			if (!this[0]) {
				return null
			}
			return H !== g ? this.each(function() {
				this == l || this == document ? l.scrollTo(!F ? H : o(l).scrollLeft(), F ? H : o(l).scrollTop()) : this[G] = H
			}) : this[0] == l || this[0] == document
					? self[F ? "pageYOffset" : "pageXOffset"] || o.boxModel && document.documentElement[G] || document.body[G]
					: this[0][G]
		}
	});
	o.each(["Height", "Width"], function(I, G) {
		var E = I ? "Left" : "Top", H = I ? "Right" : "Bottom", F = G.toLowerCase();
		o.fn["inner" + G] = function() {
			return this[0] ? o.css(this[0], F, false, "padding") : null
		};
		o.fn["outer" + G] = function(K) {
			return this[0] ? o.css(this[0], F, false, K ? "margin" : "border") : null
		};
		var J = G.toLowerCase();
		o.fn[J] = function(K) {
			return this[0] == l
					? document.compatMode == "CSS1Compat" && document.documentElement["client" + G] || document.body["client" + G]
					: this[0] == document ? Math.max(document.documentElement["client" + G], document.body["scroll" + G],
							document.documentElement["scroll" + G], document.body["offset" + G], document.documentElement["offset" + G]) : K === g
							? (this.length ? o.css(this[0], J) : null)
							: this.css(J, typeof K === "string" ? K : K + "px")
		}
	})
})();
;// =============================================================================
// 文件名: system.js
// 版权: Copyright (C) 2009 Elong
// 创建人: zhi.luo
// 创建日期: 2009-8-17
// 描述: 此文件修改请通知作者
// 备注: String, Object，Event, Globals, StringBuilder, Template, elongAjax类扩展和实现
// *************常用代码示例: ***********
// var bool = Object.isNull(obj); // 空对象?
// var obj2 = Object.clone(obj); //克隆对象
// var bool = String.isNullOrEmpty(input); // 空字符串?
// var str = "test ";
// str.trim(); // 去掉前后空格
// str.startsWith("t");
// str.isJSON();

// var sb = new StringBuilder();
// sb.append(String.format("你好，{0}", "luozhi"));
// var str = sb.toString();

// var listTemplate = new Template("<li class=\"li_q\" method=\"select\"
// value=\"#{Value}\">#{Name}</li>");
// var sb = new StringBuilder();
// for (var i = 0; i < this.data.length; i++) {
// sb.append(listTemplate.eval({
// Name: this.data[i].Name,
// Value: i
// }));
// }

// 延时多少毫秒执行函数
// this.showTimer = FunctionExt.defer(function() {
// // ...执行逻辑
// clearTimeout(this.showTimer);
// this.showTimer = null;
// }, 600, this);

// 异步调用
// elongAjax.callBack(requestUrl, args, clientCallBack, enabledCache,
// httpmethod, submitButton, dataType)
// 如：
// elongAjax.callBack("/getuserinfo.aspx", {userid: 2342, code:22342},
// function(res){
// if(res.success){
// alert(res.value);
// }
// }.bind(this));

// //参数： uid登陆名，pwd密码，vcode需要验证码时传入验证码
// //返回res: {"CardNoList":常用卡号集,"IsShowVCode":是否需要输入验证码,
// // "MemberLoginCode":登陆结果码,SelectedCardNo:多个卡号时用户选择的卡号}
// Elong.login(uid, pwd, vcode, function(res) {
// if (res.MemberLoginCode != 1 && res.IsShowVCode) {
// //显示验证码输入框
// }
// switch (res.MemberLoginCode) {
// case 1: break;
// case 100: break; // 登录名不存
// case 101: break; // 登录密码错误
// case 102: break; // 匹配了多个用户名,而且用户没有选择卡号
// case 103: break; // 用户已经被冻结或取消
// case 104: break; // 验证码错误
// default: break; //未知错误
// }
// } .bind(this));
// =============================================================================

// /////////////////// Class Begin /////////////////////////////////
Function.prototype.bind = function() {
	var __method = this, args = Array.from(arguments), object = args.shift();
	return function() {
		if (typeof Array.from == 'function') {
			return __method.apply(object, args.concat(Array.from(arguments)));
		}
	}
};

Function.prototype.bindAsEventListener = function(object) {
	var __method = this, args = Array.from(arguments), object = args.shift();
	return function(event) {
		if (typeof Array.from == 'function') {
			return __method.apply(object, [event || window.event].concat(args));
		}
	}
};

var Class = {
	create : function() {
		return function() {
			this.initialize.apply(this, arguments);
		};
	}
};

Object.extend = function(destination, source) {
	for ( var property in source) {
		destination[property] = source[property];
	}
	return destination;
};

Object.clone = function(obj) {
	var objClone;
	if (Object.isNull(obj)) {
		return null;
	}
	if (obj.constructor == Object) {
		objClone = new obj.constructor();
	} else {
		objClone = new obj.constructor(obj.valueOf());
	}
	for ( var key in obj) {
		if (objClone[key] != obj[key]) {
			if (typeof (obj[key]) == 'object') {
				objClone[key] = Object.clone(obj[key]);
			} else {
				objClone[key] = obj[key];
			}
		}
	}
	objClone.toString = obj.toString;
	objClone.valueOf = obj.valueOf;
	return objClone;
};

Object.isNull = function(obj) {
	return typeof (obj) == "undefined" || obj == null;
};

Array.from = function(iterable) {
	if (!iterable)
		return [];
	if (iterable.toArray) {
		return iterable.toArray();
	} else {
		var results = [];
		for (var i = 0, length = iterable.length; i < length; i++)
			results.push(iterable[i]);
		return results;
	}
};

// //////////////////////////////////////// string
// ext/////////////////////////////////
Object.extend(String, {
	interpret : function(value) {
		return value == null ? '' : String(value);
	},
	specialChar : {
		'\b' : '\\b',
		'\t' : '\\t',
		'\n' : '\\n',
		'\f' : '\\f',
		'\r' : '\\r',
		'\\' : '\\\\'
	}
});

Object.extend(String.prototype, {
	trim : function() {
		return this.replace(/(^[\s　]*)|([\s　]*$)/g, "");
	},

	lTrim : function() {
		return this.replace(/(^[\s　]*)/g, "");
	},

	rTrim : function() {
		return this.replace(/([\s　]*$)/g, "");
	},

	bytelength : function() {
		var doubleByteChars = this.match(/[^\x00-\xff]/ig);
		return this.length + (doubleByteChars == null ? 0 : doubleByteChars.length);
	},

	cut : function(n) {
		if (n > this.length) {
			return this;
		}
		return this.substring(0, n);
	},

	formatWithWBR : function() {
		var args = arguments, size = 10;
		if (args.length > 0) {
			var argument = parseInt(args[0]);
			if (!isNaN(argument) && argument > 0) {
				size = argument;
			}
		}
		var text = this, output = [], start = 0, rowStart = 0, nextChar;
		for (var i = 1, count = text.length; i < count; i++) {
			nextChar = text.charAt(i);
			if (/\s/.test(nextChar)) {
				rowStart = i;
			} else {
				if ((i - rowStart) == size) {
					output.push(text.substring(start, i));
					output.push("<wbr>");
					start = rowStart = i;
				}
			}
		}
		output.push(text.substr(start));
		return output.join("");
	},

	gsub : function(pattern, replacement) {
		var result = '', source = this, match;
		replacement = arguments.callee.prepareReplacement(replacement);

		while (source.length > 0) {
			if (match = source.match(pattern)) {
				result += source.slice(0, match.index);
				result += String.interpret(replacement(match));
				source = source.slice(match.index + match[0].length);
			} else {
				result += source, source = '';
			}
		}
		return result;
	},

	sub : function(pattern, replacement, count) {
		replacement = this.gsub.prepareReplacement(replacement);
		count = count === undefined ? 1 : count;

		return this.gsub(pattern, function(match) {
			if (--count < 0)
				return match[0];
			return replacement(match);
		});
	},

	scan : function(pattern, iterator) {
		this.gsub(pattern, iterator);
		return this;
	},

	truncate : function(length, truncation) {
		length = length || 30;
		truncation = truncation === undefined ? '...' : truncation;
		return this.length > length ? this.slice(0, length - truncation.length) + truncation : this;
	},

	strip : function() {
		return this.replace(/^\s+/, '').replace(/\s+$/, '');
	},

	stripTags : function() {
		return this.replace(/<\/?[^>]+>/gi, '');
	},

	stripScripts : function() {
		return this.replace(new RegExp(Prototype.ScriptFragment, 'img'), '');
	},

	extractScripts : function() {
		var matchAll = new RegExp(Prototype.ScriptFragment, 'img');
		var matchOne = new RegExp(Prototype.ScriptFragment, 'im');
		return (this.match(matchAll) || []).map(function(scriptTag) {
			return (scriptTag.match(matchOne) || ['', ''])[1];
		});
	},

	evalScripts : function() {
		return this.extractScripts().map(function(script) {
			return eval(script)
		});
	},

	escapeHTML : function() {
		var self = arguments.callee;
		self.text.data = this;
		return self.div.innerHTML;
	},

	unescapeHTML : function() {
		var div = document.createElement('div');
		div.innerHTML = this.stripTags();
		return div.childNodes[0] ? (div.childNodes.length > 1 ? $A(div.childNodes).inject('', function(memo, node) {
			return memo + node.nodeValue
		}) : div.childNodes[0].nodeValue) : '';
	},

	toQueryParams : function(separator) {
		var match = this.strip().match(/([^?#]*)(#.*)?$/);
		if (!match)
			return {};

		return match[1].split(separator || '&').inject({}, function(hash, pair) {
			if ((pair = pair.split('='))[0]) {
				var key = decodeURIComponent(pair.shift());
				var value = pair.length > 1 ? pair.join('=') : pair[0];
				if (value != undefined)
					value = decodeURIComponent(value);

				if (key in hash) {
					if (hash[key].constructor != Array)
						hash[key] = [hash[key]];
					hash[key].push(value);
				} else
					hash[key] = value;
			}
			return hash;
		});
	},

	toArray : function() {
		return this.split('');
	},

	succ : function() {
		return this.slice(0, this.length - 1) + String.fromCharCode(this.charCodeAt(this.length - 1) + 1);
	},

	times : function(count) {
		var result = '';
		for (var i = 0; i < count; i++)
			result += this;
		return result;
	},

	camelize : function() {
		var parts = this.split('-'), len = parts.length;
		if (len == 1)
			return parts[0];

		var camelized = this.charAt(0) == '-' ? parts[0].charAt(0).toUpperCase() + parts[0].substring(1) : parts[0];

		for (var i = 1; i < len; i++)
			camelized += parts[i].charAt(0).toUpperCase() + parts[i].substring(1);

		return camelized;
	},

	capitalize : function() {
		return this.charAt(0).toUpperCase() + this.substring(1).toLowerCase();
	},

	underscore : function() {
		return this.gsub(/::/, '/').gsub(/([A-Z]+)([A-Z][a-z])/, '#{1}_#{2}').gsub(/([a-z\d])([A-Z])/, '#{1}_#{2}').gsub(/-/, '_').toLowerCase();
	},

	dasherize : function() {
		return this.gsub(/_/, '-');
	},

	inspect : function(useDoubleQuotes) {
		var escapedString = this.gsub(/[\x00-\x1f\\]/, function(match) {
			var character = String.specialChar[match[0]];
			return character ? character : '\\u00' + match[0].charCodeAt().toPaddedString(2, 16);
		});
		if (useDoubleQuotes)
			return '"' + escapedString.replace(/"/g, '\\"') + '"';
		return "'" + escapedString.replace(/'/g, '\\\'') + "'";
	},

	toJSON : function() {
		return this.inspect(true);
	},

	unfilterJSON : function(filter) {
		return this.sub(filter || Prototype.JSONFilter, '#{1}');
	},

	isJSON : function() {
		var str = this.replace(/\\./g, '@').replace(/"[^"\\\n\r]*"/g, '');
		return (/^[,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t]*$/).test(str);
	},

	evalJSON : function(sanitize) {
		var json = this.unfilterJSON();
		try {
			if (!sanitize || json.isJSON())
				return eval('(' + json + ')');
		} catch (e) {
		}
		throw new SyntaxError('Badly formed JSON string: ' + this.inspect());
	},

	include : function(pattern) {
		return this.indexOf(pattern) > -1;
	},

	startsWith : function(pattern) {
		return this.indexOf(pattern) === 0;
	},

	endsWith : function(pattern) {
		var d = this.length - pattern.length;
		return d >= 0 && this.lastIndexOf(pattern) === d;
	},

	empty : function() {
		return this.trim() == '';
	},

	blank : function() {
		return /^\s*$/.test(this);
	}
});

String.isNullOrEmpty = function(str) {
	return str == undefined || str == null || str.empty();
};

String.format = function() {
	var args = arguments, argsCount = args.length;
	if (argsCount == 0) {
		return "";
	}
	if (argsCount == 1) {
		return args[0];
	}
	var reg = /{(\d+)?}/g, arg, result;
	if (args[1] instanceof Array) {
		arg = args[1];
		result = args[0].replace(reg, function($0, $1) {
			return arg[parseInt($1)];
		});
	} else {
		arg = args;
		result = args[0].replace(reg, function($0, $1) {
			return arg[parseInt($1) + 1];
		});
	}
	return result;
};

String.prototype.gsub.prepareReplacement = function(replacement) {
	if (typeof replacement == 'function')
		return replacement;
	var template = new Template(replacement);
	return function(match) {
		return template.evaluate(match)
	};
};

var Template = Class.create();
Template.Pattern = /(^|.|\r|\n)(#\{(.*?)\})/;
Template.prototype = {
	initialize : function(template, pattern) {
		this.template = template.toString();
		this.pattern = pattern || Template.Pattern;
	},

	eval : function(object) {
		return this.template.gsub(this.pattern, function(match) {
			var before = match[1];
			if (before == '\\')
				return match[2];
			return before + String.interpret(object[match[3]]);
		});
	}
};

/*******************************************************************************
 * StringBuilder
 ******************************************************************************/
function StringBuilder() {
	this.strings = [];
}

StringBuilder.prototype.append = function(text) {
	this.strings.push(text);
};

StringBuilder.prototype.toString = function() {
	if (arguments.length == 0) {
		return this.strings.join("");
	} else {
		return this.strings.join(arguments[0]);
	}
};

StringBuilder.prototype.clear = function() {
	this.strings.clear();
};

StringBuilder.prototype.backspace = function() {
	this.strings.pop();
};
// ///////////////////////////////////////////////////////////////////////////////////

// //////////////////////////////////////// Event
// ext/////////////////////////////////
if (!window.Event) {
	var Event = new Object();
}
Object.extend(Event, {
	KEY_BACKSPACE : 8,
	KEY_TAB : 9,
	KEY_RETURN : 13,
	KEY_ESC : 27,
	KEY_LEFT : 37,
	KEY_UP : 38,
	KEY_RIGHT : 39,
	KEY_DOWN : 40,
	KEY_DELETE : 46,
	KEY_HOME : 36,
	KEY_END : 35,
	KEY_PAGEUP : 33,
	KEY_PAGEDOWN : 34,

	element : function(event) {
		return $(event.target || event.srcElement);
	},

	isLeftClick : function(event) {
		return (((event.which) && (event.which == 1)) || ((event.button) && (event.button == 1)));
	},

	pointerX : function(event) {
		return event.pageX || (event.clientX + (document.documentElement.scrollLeft || document.body.scrollLeft));
	},

	pointerY : function(event) {
		return event.pageY || (event.clientY + (document.documentElement.scrollTop || document.body.scrollTop));
	},

	stop : function(event) {
		if (event.preventDefault) {
			event.preventDefault();
			event.stopPropagation();
		} else {
			event.returnValue = false;
			event.cancelBubble = true;
		}
	},

	// find the first node with the given tagName, starting from the
	// node the event was triggered on; traverses the DOM upwards
	findElement : function(event, tagName) {
		var element = Event.element(event);
		while (element.parentNode && (!element.tagName || (element.tagName.toUpperCase() != tagName.toUpperCase())))
			element = element.parentNode;
		return element;
	},

	observers : false,

	_observeAndCache : function(element, name, observer, useCapture) {
		if (!this.observers)
			this.observers = [];
		if (element.addEventListener) {
			this.observers.push([element, name, observer, useCapture]);
			element.addEventListener(name, observer, useCapture);
		} else if (element.attachEvent) {
			this.observers.push([element, name, observer, useCapture]);
			element.attachEvent('on' + name, observer);
		}
	},

	unloadCache : function() {
		if (!Event.observers)
			return;
		for (var i = 0, length = Event.observers.length; i < length; i++) {
			Event.stopObserving.apply(this, Event.observers[i]);
			Event.observers[i][0] = null;
		}
		Event.observers = false;
	},

	observe : function(element, name, observer, useCapture) {
		element = $(element);
		useCapture = useCapture || false;

		if (name == 'keypress' && (Prototype.Browser.WebKit || element.attachEvent))
			name = 'keydown';

		Event._observeAndCache(element, name, observer, useCapture);
	},

	stopObserving : function(element, name, observer, useCapture) {
		element = $(element);
		useCapture = useCapture || false;

		if (name == 'keypress' && (Prototype.Browser.WebKit || element.attachEvent))
			name = 'keydown';

		if (element.removeEventListener) {
			element.removeEventListener(name, observer, useCapture);
		} else if (element.detachEvent) {
			try {
				element.detachEvent('on' + name, observer);
			} catch (e) {
			}
		}
	}
});
// ///////////////////////////////////////////////////////////////////////////////////

// //////////////////////////////////////// Globals
// function//////////////////////////
var Globals = {
	// Add By Andy
	// For ManageHeader
	ScriptContentFragment : '<script.*?>((\n|\r|.)*?)<\/script>',
	// <script.*?src=\"((\n|\r|.)*?)\"><\/script>
	ScriptSrcFragment : '<script.*?src=\"([\?=\/\.A-Za-z0-9_]*)\".*?><\/script>',

	// 取得样式内容的正则表达式
	StyleContentFragment : '<style.*?>((\n|\r|.)*?)<\/style>',
	StyleHrefFragment : '<link.*?href=\"([\/\.A-Za-z0-9_]*)\".*?><\/link>',

	// 用于遮蔽IE6下弹出层下出现下拉框的情况, 返回添加的iframe元素；以便调用closeIE6Fliter
	addIE6Filter : function(width, height, left, top, zindex) {
		if ($.browser.msie && $.browser.version < 7) {
			var filterTemplate = new Template(
					"<iframe style=\"position: absolute; z-index: #{zindex}; width:#{width}px;height:#{height}px; top: #{top}px; left: #{left}px;border:0px solid #000;filter:alpha(opacity=0);-moz-opacity:0\"></iframe>");
			return $(filterTemplate.eval({
				width : width + 2,
				height : height + 2,
				left : left,
				top : top,
				zindex : Object.isNull(zindex) ? 1 : zindex
			})).appendTo($("#m_contentend"));
		}
	},
	// 移除IE6的层遮蔽
	closeIE6Fliter : function(iframe) {
		if (!Object.isNull(iframe)) {
			iframe.remove();
			iframe = null;
		}
	},

	// 解决IE下下拉列表的bug：下拉列表内容超长时，下拉框自动伸缩
	registerSelectFixIE : function(selects) {
		if (!$.browser.msie) {
			return;
		}
		var show = function(evt) {
			var element = Event.element(evt);
			var isOpen = element.data("isOpen");
			if (!Object.isNull(isOpen) || isOpen) {
				return;
			}
			element.data("isOpen", true);

			var position = element.position();
			var oldWidth = element.width();

			var clone_selection = element.data("clone");
			if (clone_selection == null) {
				clone_selection = $("<select style='visibility:hidden'></select>").insertBefore(element);
				clone_selection.addClass(element[0].className);
				element.data("clone", clone_selection);
			}

			element.css("width", "auto");
			var newWidth = element.width();
			if (oldWidth >= newWidth) {
				element.css("width", oldWidth);
			}
			element.css("top", position.top + "px");
			element.css("left", position.left + "px");
			element.css("position", "absolute");
			element.css("z-index", "1000");
		};
		var close = function(evt) {
			var element = Event.element(evt);
			var isOpen = element.data("isOpen");
			if (isOpen) {
				var oldData = element.data("clone");
				element.css("position", "");
				element.css("width", oldData.css("width"));
				element.css("top", "");
				element.css("left", "");
				element.css("z-index", oldData.css("z-index"));
				element.data("isOpen", null);
				element.data("clone", null);
				oldData.remove();
			}
		};

		for (var i = 0; i < arguments.length; i++) {
			var select = arguments[i];
			select.bind("mousedown", function(evt) {
				show(evt);
			});
			select.bind("blur", function(evt) {
				close(evt);
			});
			select.bind("change", function(evt) {
				close(evt);
			});
		}
	},

	// 获取浏览器滚动条坐标
	getScrollPosition : function() {
		var pagePosition = {
			x : 0,
			y : 0
		};
		if (typeof (window.pageYOffset) == 'number') {
			pagePosition.x = window.pageXOffset;
			pagePosition.y = window.pageYOffset;
		} else if (document.body && (document.body.scrollLeft || document.body.scrollTop)) {
			pagePosition.x = document.body.scrollLeft;
			pagePosition.y = document.body.scrollTop;
		} else if (document.documentElement) {
			pagePosition.x = document.documentElement.scrollLeft;
			pagePosition.y = document.documentElement.scrollTop;
		}
		return pagePosition;
	},
	// 获取浏览器窗口大小
	browserDimensions : function() {
		var dimensions = {
			width : 0,
			height : 0
		};
		if ($.browser.msie) {
			dimensions.height = document.documentElement.clientHeight;
			dimensions.width = document.documentElement.clientWidth;
		} else {
			dimensions.height = window.innerHeight;
			dimensions.width = document.width || document.body.offsetWidth;
		}
		return dimensions;
	},

	// 获取请求参数
	getParam : function(paramName) {
		var params = this._getParams();
		if (Object.isNull(params)) {
			return "";
		}
		return params[paramName];
	},

	_getParams : function() {
		var o = {};
		var params = document.location.search.substr(1).split("&");
		if (String.isNullOrEmpty(params)) {
			return null;
		}
		for (var i = 0, count = params.length; i < count; i++) {
			try {
				var param = params[i].split("=");
				if (param.length < 2)
					continue;
				o[param[0]] = param[1].Trim();

			} catch (e) {
			}
		}
		return o;
	},

	// 拷贝到剪切板
	copyToClipboard : function(txt) {
		if (window.clipboardData) {
			window.clipboardData.clearData();
			window.clipboardData.setData("Text", txt);
		} else if ($.browser.opera) {
			window.location = txt;
		} else if ($.browser.mozilla) {
			try {
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
			} catch (e) {
				alert("你的firefox安全限制限制您进行剪贴板操作，请在地址栏输入: about:config 将signed.applets.codebase_principal_support设置为true之后重试");
				return false;
			}
			var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
			if (!clip)
				return false;
			var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
			if (!trans)
				return false;
			trans.addDataFlavor('text/unicode');
			var len = {};
			var str = Components.classes['@mozilla.org/supports-string;1'].createInstance(Components.interfaces.nsISupportsString);
			var copytext = txt;
			str.data = copytext;
			trans.setTransferData('text/unicode', str, copytext.length * 2);
			var clipid = Components.interfaces.nsIClipboard;
			if (!clip) // Should be clipid, RobertUn 080130
				return false;
			clip.setData(trans, null, clipid.kGlobalClipboard);
		}
		return true;
	},

	// 隐藏选择框
	hideSelect : function() {
		if ($.browser.msie) {
			var selectors = document.getElementsByTagName("SELECT");
			for (var i = 0, count = selectors.length; i < count; i++) {
				selectors[i].style.visibility = "hidden";
			}
		}
	},

	// 显示选择框
	showSelect : function() {
		if ($.browser.msie) {
			var selectors = document.getElementsByTagName("SELECT");
			for (var i = 0, count = selectors.length; i < count; i++) {
				selectors[i].style.visibility = 'visible';
			}
		}
	},

	// 动态加载Script文件，check参数表示是否检查重复，默认为true，相同url的js文件不会被重复加载
	loadScript : function(url, check) {
		if (arguments.length <= 1) {
			check = true;
		}
		var head = document.getElementsByTagName("head")[0];
		var hasCreated = false;
		var script = document.createElement("script");

		if (check) {
			script.type = "text/javascript";
			script.src = url;
			url = script.src;
			var old = jQuery("script[src='" + url + "']", head);
			if (old && old.size() > 0) {
				hasCreated = true;
			}
		}

		if (!hasCreated) {
			head.appendChild(script);
		} else {
			script = null;
		}
	},

	// 动态加载Css文件，check参数表示是否检查重复，默认为true，相同url的css文件不会被重复加载
	loadCss : function(url, check) {
		if (arguments.length <= 1) {
			check = true;
		}
		var head = document.getElementsByTagName("head")[0];
		var hasCreated = false;

		if (check) {
			var oldCss = jQuery("link[href='" + url + "']", head);
			if (oldCss && oldCss.size() > 0) {
				hasCreated = true;
			}
		}

		if (!hasCreated) {
			var css = document.createElement("link");
			css.type = "text/css";
			css.rel = "stylesheet";
			css.href = url;
			head.appendChild(css);
		}
	},
	cookie : function(name, subName, value, options) {// Globals.cookie start
		/**
		 * Cookie plugin
		 * 
		 * Copyright (c) 2006 ziqiu.zhang Dual licensed under the MIT and GPL
		 * licenses: http://www.opensource.org/licenses/mit-license.php
		 * http://www.gnu.org/licenses/gpl.html
		 * 
		 * 修改历史: 修改前: 读取时,如果没有子键对应的cookie，返回主键对应的cookie.
		 * 修改后：读取时,如果没有子键对应的cookie, 返回"". 修改人: jianbo.liu 时 间: 2011/02/14
		 * 
		 * 修改前: 存cookie时，不支持按子键存cookie. 修改后：存cookie时，按主键，子键存cookie都支持. 修改人:
		 * jianbo.liu 时 间: 2011/03/18
		 * 
		 * 
		 * 使用举例： //注： 写入时，subName参数请传递空值或null //写入Cookies-值为字符串，即不包含子键
		 * Globals.cookie("singleKey", "", "singleKey-value", { expires: 1,
		 * path: "/", secure: false }) //读取Cookies-根据主键 alert("singleKey:" +
		 * Globals.cookie("singleKey"));
		 * 
		 * //写入Cookies-值为对象，则每个属性名为子键的名称，属性值为子键值 var subNameObj = { subName1:
		 * "aaa", subName2: "bbb", subName3: "ccc" }; Globals.cookie("multiKey",
		 * "", subNameObj, { expires: 1, path: "/", secure: false });
		 * //读取Cookies-根据主键 alert("multiKey:" + Globals.cookie("multiKey"));
		 * //读取Cookies-根据主键和子键 alert("multiKey,subName1:" +
		 * Globals.cookie("multiKey", "subName1"));
		 * 
		 */
		if (typeof value != 'undefined') { // name and value given, set cookie
			options = options || {};
			if (value === null) {
				value = '';
				options.expires = -1;
			}
			var expires = '';
			if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
				var date;
				if (typeof options.expires == 'number') {
					date = new Date();
					date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
				} else {
					date = options.expires;
				}
				expires = '; expires=' + date.toUTCString(); // use expires
																// attribute,
																// max-age is
																// not supported
																// by IE
			}
			// CAUTION: Needed to parenthesize options.path and options.domain
			// in the following expressions, otherwise they evaluate to
			// undefined
			// in the packed version for some reason...
			var hostStr = window.location.host.split(".");
			var hostName = hostStr.length >= 2 ? String.format(";domain={0}.{1}", hostStr[hostStr.length - 2], hostStr[hostStr.length - 1]) : "";

			var path = options.path ? '; path=' + (options.path) : ';path=/';
			var domain = options.domain ? '; domain=' + (options.domain) : hostName;
			var secure = options.secure ? '; secure' : '';

			// 获取要更新的cookie了键名称及值
			var newCookies = new Array();
			if (typeof value == "object" && String.isNullOrEmpty(subName)) {

				// If value is an object, each property will be a sub key;
				for ( var tempValue in value) {
					eval("var obj = {" + String.format("\"name\":\"{0}\",\"value\":\"{1}\"", tempValue, value[tempValue]) + "};");
					newCookies.push(obj);
				}

			} else if (!String.isNullOrEmpty(subName)) {
				eval("var obj = {" + String.format("\"name\":\"{0}\",\"value\":\"{1}\"", subName, value) + "};");
				newCookies.push(obj);

			}

			// 获取没更新前的cookie值
			var nowCookies = String.isNullOrEmpty(this.cookie(name)) ? "" : this.cookie(name);
			nowCookies = nowCookies.replace(/=.*?(&|$)/ig, function(word) {
				word = word.replace(/(=|&)/ig, "");
				return "=" + encodeURIComponent(word) + "&";
			});
			// 循环每个键值，如果cookie中已经存在，那么用新值更新它 ，如果不存在那么添加一个新的cookie
			if (typeof value != "object" && String.isNullOrEmpty(subName)) {
				nowCookies = encodeURIComponent(value);
			} else {
				while (1) {
					var newCookie = newCookies.pop();
					if (newCookie == null || newCookie == "undefined")
						break;

					var pattern = new RegExp(String.format("(^|&){0}=.*?(&|$)", newCookie.name), "gi");

					if (pattern.test(nowCookies)) {
						// cookie已经存在
						if (!nowCookies.startsWith(newCookie.name + "=")) {
							nowCookies = nowCookies.replace(pattern, "&" + String.format("{0}={1}", newCookie.name, encodeURIComponent(newCookie.value) + "&")); // 这里把&符也替换了，需要加上
						} else {
							nowCookies = nowCookies.replace(pattern, String.format("{0}={1}", newCookie.name, encodeURIComponent(newCookie.value) + "&")); // 这里把&符也替换了，需要加上
						}
					} else {
						// cookie未存在
						if (!nowCookies.endsWith("&") && !String.isNullOrEmpty(nowCookies))
							nowCookies += "&";
						nowCookies += String.format("{0}={1}", newCookie.name, encodeURIComponent(newCookie.value));
					}
				}
			}
			document.cookie = [name, '=', nowCookies, expires, path, domain, secure].join('');

		} else { // only name given, get cookie
			var cookieValue = null;
			if (document.cookie && document.cookie != '') {
				var cookies = document.cookie.split(';');
				for (var i = 0; i < cookies.length; i++) {
					var cookie = jQuery.trim(cookies[i]);
					// Does this cookie string begin with the name we want?
					if (cookie.substring(0, name.length + 1) == (name + '=')) {
						cookieValue = decodeURIComponent(cookie.substring(name.length + 1));

						// Search sub key
						if (typeof subName != 'undefined' && subName != null && subName != "") {
							var subCookies = cookieValue.toString().split('&');
							var tmpCookies = "";
							for (var j = 0; j < subCookies.length; j++) {
								var subCookie = jQuery.trim(subCookies[j]);
								if (subCookie.substring(0, subName.length + 1) == (subName + '=')) {
									tmpCookies = decodeURIComponent(subCookie.substring(subName.length + 1));
									break;
								}
							}
							cookieValue = tmpCookies;
						}

						break;
					}

				}
			}
			return cookieValue;
		}

	}, // Globals.cookie end
	searchObj : function(patternField, patternValue, searchData) {// Globals.searchObj
																	// start
		/*
		 * patternField: string类型,匹配的字段名称 patternValue: 任意类型,匹配的值，现在只支持字符串和数字。
		 * searchData: 数据源,一个集合对象。 使用举例： var result =
		 * Globals.searchObj("CityThreeSign", "BJS", cityData);
		 * alert(result[0].CityNameEn);
		 * 上面的例子。在cityData（城市数据对象）上查找CityThreeSign属性是BJS的对象，并以集合的形式返回。
		 */
		var result = [];
		if (searchData) {
			var pat = patternField.split("|");
			for (var k = 0; k < pat.length; k++) {
				for (var i = 0; i < searchData.length; i++) {
					var tempValue = null;
					eval("tempValue = searchData[i]." + pat[k]);
					patternValue = patternValue.replace(/[\s,\']+/g, "");

					if (tempValue != null) {
						tempValue = tempValue.replace(/[\s,\']+/g, "");
						if (tempValue.toLowerCase() == encodeURIComponent(patternValue).toLowerCase() || tempValue.toLowerCase() == patternValue.toLowerCase()) // ||
																																								// tempValue.replace(/\s+/g,
																																								// "").toLowerCase()
																																								// ==
																																								// encodeURIComponent(patternValue.replace(/\s+/g,
																																								// "")).toLowerCase())
						{
							result.push(searchData[i]);
							continue;
						}
						if (decodeURIComponent(tempValue).indexOf("(") >= 0 || decodeURIComponent(tempValue).indexOf("（") >= 0) {
							var tempLeft = decodeURIComponent(tempValue).replace(/\s+/g, "").replace(/[(,),（,）]/g, "|").split("|");
							for (var j = 0; j < tempLeft.length; j++) {
								if (!String.isNullOrEmpty(tempLeft[j]) && tempLeft[j].toLowerCase() == (patternValue).toLowerCase()) {
									// result.push(searchData[i]);
									break;
								}
							}
							continue;
						}

					}
				}

			}
		} else {
			alert("Globals.searchObj方法没有检测到数据源参数：searchObj");
		}
		return result;
	} // Globals.searchObj end
};

// 扩展Globals对象，添加JSON解析的相关方法。可以使用Globals.toJSON将javascript对象格式化成JSON字符串。
// ziqiu.zhang 2009.12.10
(function($) {
	function toIntegersAtLease(n)
	// Format integers to have at least two digits.
	{
		return n < 10 ? '0' + n : n;
	}

	Date.prototype.toJSON = function(date)
	// Yes, it polutes the Date namespace, but we'll allow it here, as
	// it's damned usefull.
	{
		return this.getUTCFullYear() + '-' + toIntegersAtLease(this.getUTCMonth()) + '-' + toIntegersAtLease(this.getUTCDate());
	};

	var escapeable = /["\\\x00-\x1f\x7f-\x9f]/g;
	var meta = { // table of character substitutions
		'\b' : '\\b',
		'\t' : '\\t',
		'\n' : '\\n',
		'\f' : '\\f',
		'\r' : '\\r',
		'"' : '\\"',
		'\\' : '\\\\'
	};

	$.quoteString = function(string)
	// Places quotes around a string, inteligently.
	// If the string contains no control characters, no quote characters, and no
	// backslash characters, then we can safely slap some quotes around it.
	// Otherwise we must also replace the offending characters with safe escape
	// sequences.
	{
		if (escapeable.test(string)) {
			return '"' + string.replace(escapeable, function(a) {
				var c = meta[a];
				if (typeof c === 'string') {
					return c;
				}
				c = a.charCodeAt();
				return '\\u00' + Math.floor(c / 16).toString(16) + (c % 16).toString(16);
			}) + '"';
		}
		return '"' + string + '"';
	};

	$.toJSON = function(o, compact) {
		var type = typeof (o);

		if (type == "undefined")
			return "undefined";
		else if (type == "number" || type == "boolean")
			return o + "";
		else if (o === null)
			return "null";

		// Is it a string?
		if (type == "string") {
			return $.quoteString(o);
		}

		// Does it have a .toJSON function?
		if (type == "object" && typeof o.toJSON == "function")
			return o.toJSON(compact);

		// Is it an array?
		if (type != "function" && typeof (o.length) == "number") {
			var ret = [];
			for (var i = 0; i < o.length; i++) {
				ret.push($.toJSON(o[i], compact));
			}
			if (compact)
				return "[" + ret.join(",") + "]";
			else
				return "[" + ret.join(", ") + "]";
		}

		// If it's a function, we have to warn somebody!
		if (type == "function") {
			throw new TypeError("Unable to convert object of type 'function' to json.");
		}

		// It's probably an object, then.
		var ret = [];
		for ( var k in o) {
			var name;
			type = typeof (k);

			if (type == "number")
				name = '"' + k + '"';
			else if (type == "string")
				name = $.quoteString(k);
			else
				continue; // skip non-string or number keys

			var val = $.toJSON(o[k], compact);
			if (typeof (val) != "string") {
				// skip non-serializable values
				continue;
			}

			if (compact)
				ret.push(name + ":" + val);
			else
				ret.push(name + ": " + val);
		}
		return "{" + ret.join(", ") + "}";
	};

	$.compactJSON = function(o) {
		return $.toJSON(o, true);
	};

	$.evalJSON = function(src)
	// Evals JSON that we know to be safe.
	{
		return eval("(" + src + ")");
	};

	$.secureEvalJSON = function(src)
	// Evals JSON in a way that is *more* secure.
	{
		var filtered = src;
		filtered = filtered.replace(/\\["\\\/bfnrtu]/g, '@');
		filtered = filtered.replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']');
		filtered = filtered.replace(/(?:^|:|,)(?:\s*\[)+/g, '');

		if (/^[\],:{}\s]*$/.test(filtered))
			return eval("(" + src + ")");
		else
			throw new SyntaxError("Error parsing JSON, source is not valid.");
	};
})(Globals);
// ///////////////////////////////////////////////////////////////////////////////////
FunctionExt = {
	createCallback : function(functionObj/* args... */) {
		// make args available, in function below
		var args = arguments;
		var method = functionObj;
		return function() {
			return method.apply(window, args);
		};
	},

	createDelegate : function(functionObj, obj, args, appendArgs) {
		var method = functionObj;
		return function() {
			var callArgs = args || arguments;
			if (appendArgs === true) {
				callArgs = Array.prototype.slice.call(arguments, 0);
				callArgs = callArgs.concat(args);
			} else if (typeof appendArgs == "number") {
				callArgs = Array.prototype.slice.call(arguments, 0); // copy
																		// arguments
																		// first
				var applyArgs = [appendArgs, 0].concat(args); // create method
																// call params
				Array.prototype.splice.apply(callArgs, applyArgs); // splice
																	// them in
			}
			return method.apply(obj || window, callArgs);
		};
	},

	defer : function(functionObj, millis, obj, args, appendArgs) {
		var fn = this.createDelegate(functionObj, obj, args, appendArgs);
		if (millis) {
			return setTimeout(fn, millis);
		}
		fn();
		return 0;
	}
};
// //////////////////////////////////////// Ajax
// function/////////////////////////////
var simpleAjax = {
	Max_Cache_Size : 10,
	cacheConent : {
		data : {},
		index : []
	},
	cache_key : null,
	callBack : function(requestUrl, args, clientCallBack, enabledCache, httpmethod, dataType) {
		var async = true;
		if (!clientCallBack || clientCallBack == null) {
			async = false;
		}
		var requestObj = {
			args : args,
			url : requestUrl,
			clientCallBack : clientCallBack,
			method : httpmethod
		};
		this.cache_key = requestUrl + args;
		// 如果存在Cahche
		if (enabledCache) {
			if (!Object.isNull(this.cacheConent.data[this.cache_key])) {
				FunctionExt.defer(requestObj.clientCallBack, 1, null, [this.cacheConent.data[this.cache_key]]);
				return;
			}
		}
		requestObj.xmlhttp = jQuery.ajax({
			type : Object.isNull(httpmethod) ? "GET" : httpmethod,
			url : requestUrl,
			cache : Object.isNull(enabledCache) ? false : enabledCache,
			data : args,
			requestObj : requestObj,
			error : this.onError,
			// success: this.onSuccess,
			complete : this.onComplete,
			dataType : Object.isNull(dataType) ? "json" : dataType,
			timeout : 60000,
			success : function(data, textStatus) {
				this.cacheConent.data[this.cache_key] = data;
				this.cacheConent.index.unshift(this.cache_key);
				if (this.cacheConent.index.length > this.Max_Cache_Size) {
					var del_cahce_key = this.cacheConent.index.pop();
					delete this.cacheConent.data[del_cahce_key];
				}
				FunctionExt.defer(requestObj.clientCallBack, 1, null, [data]);
			}.bind(this)
		});
	},
	onError : function(XMLHttpRequest, textStatus, errorThrown) {
		FunctionExt.defer(this.requestObj.clientCallBack, 1, null, [{
			success : false,
			status : textStatus,
			value : XMLHttpRequest.responseText
		}]);
	},

	// onSuccess: function (data, textStatus) {
	// FunctionExt.defer(this.requestObj.clientCallBack, 1, null, [data]);
	// },

	onComplete : function(XMLHttpRequest, textStatus) {
		if (!Object.isNull(this.requestObj)) {
			this.requestObj = null;
			delete this.requestObj;
		}
	}

};
var elongAjax = {
	requestQueue : [],
	/*
	 * Ajax请求 @args:对象{} @clientCallBack:客户端回调的方法 @requestUrl:请求的URL
	 * @enabledCache: true,false; @isPipeFrist:
	 * ajax请求管道，值true:先发起请求有效后发起请求丢弃，false：先发起请求丢弃后发起有效
	 */
	callBack : function(requestUrl, args, clientCallBack, enabledCache, httpmethod, isPipeFrist, dataType) {

		// this.addOverlay(submitButton);
		isPipeFrist = Object.isNull(isPipeFrist) ? true : isPipeFrist;
		args = this.buildArgObject(Object.clone(args));

		var async = true;
		if (!clientCallBack || clientCallBack == null) {
			async = false;
		}
		var requestObj = {
			args : args,
			url : requestUrl,
			clientCallBack : clientCallBack,
			isPipeFrist : isPipeFrist,
			method : httpmethod,
			dequeue : this.dequeue.bind(this)
		};
		if (async) {
			if (isPipeFrist) {
				if (this.inQueue(requestObj)) {
					return;
				}
			} else {
				for (var i = this.requestQueue.length - 1; i >= 0; i--) {
					if (requestObj.url == this.requestQueue[i].url && !Object.isNull(this.requestQueue[i].xmlhttp)) {
						this.requestQueue[i].xmlhttp.abort();
						this.dequeue(this.requestQueue[i]);
						break;
					}
				}
			}

			this.requestQueue.push(requestObj);
		}

		requestObj.xmlhttp = jQuery.ajax({
			type : Object.isNull(httpmethod) ? "GET" : httpmethod,
			url : requestUrl,
			cache : Object.isNull(enabledCache) ? false : enabledCache,
			data : args,
			requestObj : requestObj,
			error : this.onError,
			success : this.onSuccess,
			complete : this.onComplete,
			dataType : Object.isNull(dataType) ? "json" : dataType,
			timeout : 60000
		});
	},

	buildArgObject : function(obj, sourceObj, sourcekey) {
		if (sourceObj == null) {
			sourceObj = obj;
		}
		if (sourcekey == null) {
			sourcekey = "";
		}

		for ( var key in obj) {
			// 子function舍弃
			if ($.isFunction(obj[key])) {
				obj[key] = null;
				delete obj[key];
				break;
			}
			// 处理数组
			if ($.isArray(obj[key])) {
				for (var i = 0; i < obj[key].length; i++) {
					if (typeof (obj[key][i]) == 'object') {
						this.buildArgObject(obj[key][i], sourceObj, sourcekey + key + "[" + i + "].");
					} else {
						var name = sourcekey + key + "[" + i + "]";
						sourceObj[name] = obj[key][i];
					}
				}
				obj[key] = null;
				delete obj[key];
			}
			// 处理子对象
			else if (typeof (obj[key]) == 'object') {
				this.buildArgObject(obj[key], sourceObj, sourcekey + key + ".");
				obj[key] = null;
				delete obj[key];
			} else {
				var name = isNaN(parseInt(key, 10)) ? sourcekey + key : sourcekey.substr(0, sourcekey.length - 1);
				sourceObj[name] = obj[key];
			}
		}
		return obj;
	},

	toQueryString : function(args) {
		var queryString = "";
		if (args) {
			var parms = [];
			for (var i = 0, count = args.length; i < count; i++) {
				parms.push("&Ajax_CallBackArgument");
				parms.push(i);
				parms.push("=");
				parms.push(encodeURIComponent(args[i]));
			}
			queryString = parms.join("");
		}
		return queryString;
	},

	inQueue : function(requestObj) {
		if (this.requestQueue.length > 0) {
			var requestQueue = this.requestQueue, request = null;
			for (var i = 0, count = requestQueue.length; i < count; i++) {
				request = requestQueue[i];
				if (request == requestObj) {
					return true;
				} else {
					if (this.equal(request, requestObj)) {
						return true;
					}
				}
			}
			return false;
		}
	},

	dequeue : function(requestObj) {
		if (this.requestQueue.length > 0) {
			var requestQueue = this.requestQueue, request = null, index = -1;
			for (var i = 0, count = requestQueue.length; i < count; i++) {
				request = requestQueue[i];
				if (request == requestObj) {
					index = i;
					break;
				} else {
					if (this.equal(request, requestObj)) {
						index = i;
						break;
					}
				}
			}
			if (index >= 0) {
				requestQueue.splice(index, 1);
			}
		}
	},

	equal : function(request, requestObj) {
		if (request.url == requestObj.url && this.toQueryString(request.args) == this.toQueryString(requestObj.args)) {
			return true;
		}
		return false;
	},

	onError : function(XMLHttpRequest, textStatus, errorThrown) {
		FunctionExt.defer(this.requestObj.clientCallBack, 1, null, [{
			success : false,
			status : textStatus,
			value : XMLHttpRequest.responseText
		}]);
	},

	onSuccess : function(data, textStatus) {
		FunctionExt.defer(this.requestObj.clientCallBack, 1, null, [data]);
	},

	onComplete : function(XMLHttpRequest, textStatus) {
		// this.removeOverlay(requestObj.submitButton);
		if (!Object.isNull(this.requestObj)) {
			this.requestObj.dequeue(this.requestObj);
			this.requestObj = null;
			delete this.requestObj;
		}
	},

	addOverlay : function(submitButton) {
		if (Object.isNull(submitButton)) {
			return;
		}
		var uniqueId = new Date().getTime();
		var overlayId = "submitOverlay_" + uniqueId;
		var container = submitButton.parentNode;
		var overlay = Element.extend(document.createElement("div"));
		overlay.id = overlayId;
		overlay.className = "submiting";
		$("contentEnd").appendChild(overlay);
		Position.clone(submitButton, overlay);
		submitButton._overlay = overlay;
	},

	removeOverlay : function(submitButton) {
		if (typeof submitButton === "undefined" || submitButton === null) {
			return;
		}
		if (submitButton._overlay) {
			$("contentEnd").removeChild(submitButton._overlay);
			submitButton._overlay = null;
		}
	}
};
// ///////////////////////////////////////////////////////////////////////////////////
// 假Domready方法，即在调用时就会执行而不会等待到Dom加载完毕
function $ready(callback) {
	if (!Object.isNull(callback)) {
		callback();
	}

}

window.onerror = function(errMsg, errUrl, errLine) {
	try {
		if (typeof (PageSwitch) != "undefined") {
			if (PageSwitch.JsErrorMonitor == "1") {
				var browser = "";
				// 获取浏览器信息
				var now = new Date();
				var strNow = now.getFullYear() + "-" + (now.getMonth() + 1) + "-" + now.getDate() + " " + now.getHours() + ":" + now.getMinutes() + ":"
						+ now.getSeconds();
				var tj = document.createElement("img");
				tj
						.setAttribute(
								"src",
								"http://tj.elong.com/statistics.gif?DBItemName=LogErrorConnectionString&TableName=Log_OnlineWeb&ProductLine=OnlineWeb&AppName=JavaScript&LogLevel=Error&LogTime="
										+ strNow
										+ "&PageUrl="
										+ encodeURIComponent(errUrl)
										+ "&LogMsg="
										+ encodeURIComponent(errMsg)
										+ "&LogContent="
										+ encodeURIComponent(errMsg) + ";行号：" + errLine + browser);
				tj.setAttribute("height", "1");
				tj.setAttribute("width", "1");
				tj.setAttribute("border", "0");
				document.body.appendChild(tj);
			}
		}
	} catch (e) {
	}
}

// ///////////////////////////////////////////////////////////////////////////////////;//==================================================================
// 文件名: ElongCommon.js
// 版权: Copyright (C) 2009 Elong
// 创建人: zhi.Luo
// 创建日期: 2009-12-10
// 描述: Elong整站业务公共脚本类
// 备注:
// 示例代码：
// ===================================================================

var Elong = {
	version : '0.1',
	author : "zhi.luo",

	renderAds : function() {
		var region = $("#m_adsContainer");
		if (region.length == 0)
			return;

		var reg = /<script.*>(.|\n)*<\/script>/i;
		for (var i = 0; i < region.children().length; i++) {
			var adsNode = region.children().eq(i);
			var adsName = adsNode.attr("name");
			if (String.isNullOrEmpty(adsName) || $("#" + adsName).length == 0)
				continue;

			var content = adsNode.html();
			adsNode.find(":descendant").each(function() {
				if (!$(this).is("script")) {
					$(this).remove();
				}
			});
			var adsContent = content.replace(reg, "");

			if (String.isNullOrEmpty(adsContent))
				$("#" + adsName).hide();
			else
				$("#" + adsName).html(adsContent);
		}
	},

	recordSEOKeyWord : function() {
		var referrer = document.referrer;
		if (String.isNullOrEmpty(referrer)) {
			return;
		}
		referrer = referrer.toLowerCase();
		if (referrer.indexOf(".google.") > -1 || referrer.indexOf(".baidu.") > -1 || referrer.indexOf(".soso.") > -1 || referrer.indexOf(".sogou.") > -1
				|| referrer.indexOf(".youdao.") > -1 || referrer.indexOf(".bing.") > -1 || referrer.indexOf(".yahoo.") > -1) {
			var pars = "TableName=RecordSEOKeyword&CookieGuid=" + Globals.cookie("CookieGuid") + "&SessionGuid=" + Globals.cookie("SessionGuid") + "&ReferUrl="
					+ encodeURIComponent(referrer) + "&LandingPage=" + encodeURIComponent(document.location);
			var img = document.createElement("img");
			img.setAttribute("src", "http://tj.elong.com/statistics.gif?" + pars);
			$("#m_contentend").append(img);
		}
	},

	// 流量统计
	flowStatiData : function() {
		if (location.href.length > 5) {
			if (location.href.substring(0, 5) == "https") {
				return;
			}
		}
		// referHost、referQueryString、referPage
		var referHost = "";
		var referQueryString = "";
		var referrer = document.referrer.toLowerCase();
		var referPage = referrer;
		var m = referrer.indexOf("?");
		if (m > -1) {
			referPage = referrer.substring(0, m);
			referQueryString = referrer.substring(m + 1);
		}
		if (referPage.length > 7) {
			referHost = referPage.substring(7);
			var n = referHost.indexOf("/");
			if (n > -1) {
				referHost = referHost.substring(0, n);
			}
			referPage = referPage.substring(7 + referHost.length);
		}
		var currentPage = location.pathname.toLowerCase();
		var currentQueryString = location.search.toLowerCase();
		if (currentQueryString.length > 1) {
			currentQueryString = currentQueryString.substr(1);
		}
		if (currentQueryString.indexOf("flowstati") == -1 && referHost.indexOf(".elong.") > -1) {
			return;
		}

		// ReferType类型
		var eReferType = {
			seo : "seo",
			sem : "sem",
			campaign : "campaign",
			other : "other",
			redirect_edm : "redirect_edm",
			redirect_other : "redirect_other",
			elong : "elong"
		};
		// 七大搜索引擎
		var searchEngineArray = ".google.,.baidu.,.soso.,.sogou.,.youdao.,.bing.,.yahoo.".split(",");

		// referType、statiData
		var referType = "";
		var statiData = "";
		if (currentQueryString.indexOf("flowstati") > -1) {
			// 记录经过redirect.aspx页面的数据
			var flowStatiArray = Elong.getQueryStringParams(currentQueryString, "flowstati").split("_");
			referType = eReferType.redirect_other;
			if (flowStatiArray[0] == "edm") {
				referType = eReferType.redirect_edm;
			}
			if (flowStatiArray.length > 1) {
				statiData = flowStatiArray[1];
			}
		} else if (referHost.indexOf(".elong.") == -1) {
			// refer不是elong的记下
			if (currentQueryString.indexOf("campaign_id") > -1) {
				statiData = Elong.getQueryStringParams(currentQueryString, "campaign_id");
				referType = eReferType.campaign;
			} else if (String.isNullOrEmpty(referHost)) {
				statiData = "elong";
				referType = eReferType.elong;
			} else {
				statiData = referHost;
				referType = eReferType.other;
				for (var i = 0; i < searchEngineArray.length; i++) {
					if (referHost.indexOf(searchEngineArray[i]) > -1) {
						referType = eReferType.seo;
						if (currentQueryString.indexOf("semid") > -1) {
							referType = eReferType.sem;
						}
						break;
					}
				}
			}
		}

		var pars = "TableName={0}&SessionGuid={1}&ReferType={2}&StatiData={3}&ReferHost={4}&" + "ReferPage={5}&CurrentHost={6}&CurrentPage={7}&CookieGuid={8}&"
				+ "ReferQueryString={9}&CurrentQueryString={10}";
		var queryString = String.format(pars, "FlowStatiData", Globals.cookie("SessionGuid"), referType, statiData, referHost, referPage, location.hostname,
				currentPage, Globals.cookie("CookieGuid"), encodeURIComponent(referQueryString), encodeURIComponent(currentQueryString));
		var img = document.createElement("img");
		img.setAttribute("src", "http://tj.elong.com/statistics.gif?" + queryString);
		if ($("#m_contentend").length > 0) {
			$("#m_contentend").append(img);
		} else {
			$("body").append(img);
		}
	},

	// 获取QueryString的参数
	getQueryStringParams : function(queryString, paramName) {
		var paramValue = "";
		var qsArray = queryString.split("&");
		for (var i = 0; i < qsArray.length; i++) {
			var paramArray = qsArray[i].split("=");
			if (paramArray[0] == paramName && paramArray.length > 1) {
				paramValue = paramArray[1];
				break;
			}
		}
		return paramValue;
	},

	// 统一获取用户信息方法
	GetUserInfo : function(callback) {
		var params = {
			actiondo : "GetMemberNameInfo",
			loginname : "",
			pwd : "",
			vcode : "",
			isrememberme : false
		};

		var host = "my.elong.com";
		var arr = window.location.host.split(".");
		if (arr.length >= 2) {
			host = String.format("my.{0}.{1}", arr[arr.length - 2], arr[arr.length - 1]);
		}
		var language = window.location.host.toLowerCase().indexOf(".net") >= 0 ? "en" : "cn";
		var loginUrl = String.format("http://{0}/loginproxy_{1}.html", host, language);
		if (window.location.host.toLowerCase().indexOf("travel.elong") >= 0 || window.location.host.toLowerCase().indexOf("travel.net") >= 0) {
			loginUrl = String.format("http://{0}/my/loginproxy_{1}.html", window.location.host, language);
		}
		elongAjax.callBack(loginUrl, params, function(res) {
			callback(res);
		}.bind(this), false, "GET", null, "jsonp");
	},
	// 统一登录方法
	login : function(uid, pwd, vcode, callback, cardno, isEn, isrememberme) {
		var params = {
			actiondo : String.isNullOrEmpty(cardno) ? String.isNullOrEmpty(uid) && String.isNullOrEmpty(pwd) ? "nocardbooking" : "login" : "cardLogin",
			loginname : uid,
			pwd : pwd,
			vcode : vcode,
			cardno : cardno,
			isrememberme : isrememberme
		};

		var host = "my.elong.com";
		var arr = window.location.host.split(".");
		if (arr.length >= 2) {
			host = String.format("my.{0}.{1}", arr[arr.length - 2], arr[arr.length - 1]);
		}
		var language = window.location.host.toLowerCase().indexOf(".net") >= 0 ? "en" : "cn";
		var loginUrl = String.format("http://{0}/loginproxy_{1}.html", host, language);
		if (window.location.host.toLowerCase().indexOf("travel.elong") >= 0 || window.location.host.toLowerCase().indexOf("travel.net") >= 0) {
			loginUrl = String.format("http://{0}/my/loginproxy_{1}.html", window.location.host, language);
		}
		// var loginUrl =
		// String.format("http://my.elong.com/loginproxy_cn.html");
		elongAjax
				.callBack(
						loginUrl,
						params,
						function(res) {
							// 匹配了多个用户名，表示多张艺龙卡号，需要用户选择
							if (res.MemberLoginCode == 102 && !Object.isNull(res.MemberCardList) && res.MemberCardList.length > 0) {
								var sb = new StringBuilder();
								var temp = !isEn
										? new Template(
												"<div>我们查找到了您的会员记录，请选择一张您常用的卡，我们将把订单记在此卡号下，可享受艺龙积分换礼品。</div><div  class='com_dialog-content com_widget-content'><div class='UserInfo'><table width='100%' border='0' cellspacing='0' cellpadding='0' class='n_table'><tr> <th width='49%'>艺龙卡号</th><th width='30%'>会员等级</th><th width='21%'>积分</th></tr>#{list}<tr><td colspan='3' class='tc'><input type='button'  mtd='ok' class='com_search75'  value='设为常用卡' />&nbsp;<a href='#?' class='' mtd='cancel'>取消</a></td></tr></table></div></div>")
										: new Template(
												"<div>We find you have several accounts, please choose the one you want to use from below. </div><div  class='com_dialog-content com_widget-content'><div class='UserInfo'><table width='100%' border='0' cellspacing='0' cellpadding='0' class='n_table'><tr> <th width='49%'>Card</th><th width='30%'>Member Level</th><th width='21%'>Member Points</th></tr>#{list}<tr><td colspan='3' class='tc'><input type='button'  mtd='ok' class='com_search75'  value='Save' />&nbsp;<a href='#?' class='' mtd='cancel'>Cancel</a></td></tr></table></div></div>");
								for (var i = 0; i < res.CardNoList.length; i++) {
									sb.append(String.format("<tr><td><input type='radio' value='{0}' name='cd'>{0}</td><td>{1}</td> <td>{2}</td></tr>",
											res.MemberCardList[i].CardNo, res.MemberCardList[i].Memlevel, res.MemberCardList[i].MemberPoints));
								}
								$("#header span[method='login'] input").show();
								$("#header span[method='login'] input").attr("disabled", true);
								$("#header span[method='wait']").hide();

								var wind = new Dialog({
									title : !isEn ? "设置常用卡" : "Set Default Card",
									htmlContent : temp.eval({
										list : sb.toString()
									}),
									width : 525,
									closeEvent : function(window) {
										$("#header span[method='login'] input").removeAttr("disabled");
									},
									initEvent : function(window) {
										window.bind("click", function(evt) {

											var element = Event.element(evt);
											var method = element.attr("mtd");
											switch (method) {
												case "ok" :
													if (window.find("input[checked]").length == 0) {
														return;
													}
													Elong.login(uid, pwd, vcode, callback, window.find("input[checked]").val(), isEn, isrememberme);
													wind.close();
													break;
												case "cancel" :
													wind.close();
													// $("#header
													// span[method='login']
													// input").show();
													// $("#header
													// span[method='wait']").hide();
													$("#header span[method='login'] input").removeAttr("disabled");
													break;
											}

										}.bind(this));
									}.bind(this)
								});
								wind.show();
							} else {
								res.SelectedCardNo = cardno;
								callback(res);
							}
						}, false, "GET", null, "jsonp");
	},

	// 弹出登录框函数 loginUrl:登录页url isCn:是否中文
	// loginDialog: function (loginUrl, isCn) {
	// //内嵌iframe对象
	// isCn = Object.isNull(isCn) ? true : isCn;
	// var wind = new Dialog({
	// title: isCn ? "登录提示" : "Sign In",
	// htmlContent: String.format("<div><iframe frameborder='0' src='{0}'
	// width='480px' height='280px' ></iframe></div>", loginUrl),
	// width: 500,
	// height: 320,
	// initEvent: function (windowElement) {
	// // 这里绑定窗口内元素的事件处理
	// } .bind(this)
	// });
	// wind.show();
	// },

	namespace : function() {
		var a = arguments, o = null, i, j, d;
		for (i = 0; i < a.length; i = i + 1) {
			d = a[i].split(".");
			o = Elong;
			for (j = (d[0] == "Elong") ? 1 : 0; j < d.length; j = j + 1) {
				o[d[j]] = o[d[j]] || {};
				o = o[d[j]];
			}
		}
		return o;
	}
};

Elong.namespace("Elong.Control", "Elong.Page", "Elong.Utility");

var ElongHeaderControl = Elong.Control.ElongHeaderControl;
ElongHeaderControl = Class.create();

Object
		.extend(
				ElongHeaderControl.prototype,
				{
					name : "ElongHeaderControl",
					CachePage : [{
						Url : "http://www.elong.com"
					}, {
						Url : "http://www.elong.net"
					}, {
						Url : "http://iflight.elong.com"
					}, {
						Url : "http://iflight.elong.net"
					}, {
						Url : "http://hotel.elong.com"
					}, {
						Url : "http://hotel.elong.net"
					}, {
						Url : "http://hotel.elong.com/index_cn.html"
					}, {
						Url : "http://hotel.elong.net/index_en.html"
					}, {
						Url : "http://iflight.elong.com/index_cn.html"
					}, {
						Url : "http://iflight.elong.net/index_en.html"
					}

					],

					CachePagePart : [{
						Url : "http://iflight.elong.com/cn_list_"
					}, {
						Url : "http://iflight.elong.net/en_list_"
					}, {
						Url : "http://big5.elong.com/gate/big5/www.elong.com/"
					}, {
						Url : "http://big5.elong.com/gate/big5/hotel.elong.com/"
					}],
					// 初始化
					initialize : function(options) {
						this.IFlightCn = "iflight.elong.com";
						this.IFlightEn = "iflight.elong.net";
						this.IFlightOnLineCn = "travel.elong.com/iflight";
						this.IFlightOnLineEn = "travel.elong.net/iflight";
						this.initializeDOM();
						this.initializeUserLoginInfo();
						this.initializeEvent();

						this.checkBig5();

						// ------------------
						this.InitLanguage();
						this.GetLoginState();
						this.render();
					},

					CheckCahcePage : function() {
						var url = window.location.href.trim().toLowerCase();
						var inCache = false;

						for (var i = 0; i < this.CachePagePart.length; i++) {
							if (url.indexOf(this.CachePagePart[i].Url) >= 0) {
								inCache = true;
								break;
							}
						}
						if (inCache)
							return true;
						for (var i = 0; i < this.CachePage.length; i++) {
							if (url == this.CachePage[i].Url || url == this.CachePage[i].Url + "/" || url.indexOf(this.CachePage[i].Url + "?") >= 0
									|| url.indexOf(this.CachePage[i].Url + "/?") >= 0) {
								inCache = true;
								break;
							}
						}
						return inCache;

					},

					initializeDOM : function() {

						this.divLogin = $("#elongheader_login");
						this.elongheader_langs = $("#elongheader_langs");
						// --------
						this.header = $("#header");
						this.divLang = this.header.find("div[method='divLang']");
						this.ulLang = this.header.find("ul[method='ulLang']");
						this.myAccount = this.header.find("div[method='myaccount']");
						this.myLogin = this.header.find("div[method='mylogin']");
						this.userName = this.myLogin.find("input[method='user']");
						this.pass = this.myLogin.find("input[method='pass']");
						this.realpass = this.myLogin.find("input[method='realpass']");
						this.bLogin = this.myLogin.find("input[method='login']");
						this.mcontent = $("#m_contentend");

						// var host = window.location.host.toLowerCase();
						// if (host.indexOf("iflight.elong") >= 0) {
						// this.olService.hide();
						// }
					},
					initializeEvent : function() {
						this.divLogin.bind("click", this.onClickdivLogin.bindAsEventListener(this));
						this.elongheader_langs.bind("click", this.onClickelongheader_langs.bindAsEventListener(this));
						this.divLogin.bind("keydown", this.onKeyDowndivLogin.bindAsEventListener(this));
						this.divLogin.bind("mouseover", this.onMouseOverdivLogin.bindAsEventListener(this));

						// --------------
						this.header.bind("click", this.onheaderClick.bindAsEventListener(this));
						this.ulLang.bind("mouseover", this.ondivLangMouseOver.bindAsEventListener(this));
						this.divLang.bind("mouseover", this.ondivLangMouseOver.bindAsEventListener(this));
						this.divLang.bind("mouseout", this.ondivLangMouseOut.bindAsEventListener(this));
						this.divLang.find("a").bind("mouseover", this.ondivLangMouseOver.bindAsEventListener(this));
						this.divLang.find("a").bind("mouseout", this.ondivLangMouseOut.bindAsEventListener(this));
						this.myAccount.bind("mouseover", this.onmyAccountMouseOver.bindAsEventListener(this));
						this.myAccount.bind("mouseout", this.onmyAccountMouseOut.bindAsEventListener(this));
						this.myLogin.bind("mouseover", this.onmyLoginMouseOver.bindAsEventListener(this));
						this.myLogin.bind("mouseout", this.onmyLoginMouseOut.bindAsEventListener(this));
						this.userName.bind("mouseout", this.onuserNameMouseOut.bindAsEventListener(this));
						this.realpass.bind("mouseout", this.onrealpassMouseOut.bindAsEventListener(this));
						this.bLogin.bind("mouseover", this.onbLoginMouseOver.bindAsEventListener(this));
						this.bLogin.bind("mouseout", this.onbLoginMouseOut.bindAsEventListener(this));
						this.bLogin.bind("mousedown", this.onbLoginMouseDown.bindAsEventListener(this));
						this.myLogin.bind("keydown", this.onmyLoginKeyDown.bindAsEventListener(this));
					},

					onOutClick : function(evt) {

						this.onOutClickHandler = function(evt) {
							var element = Event.element(evt);
							if (this.myLogin.find(":descendant").index(element) >= 0) {
								FunctionExt.defer(this.onOutClick.bindAsEventListener(this), 100);
							} else {
								this.myLogin.find("div[method='dvlogin']").addClass("none");
								this.myLogin.find("span[method='mylogin']").removeClass("on");
								$("#m_contentend").find("div[class='com_bug']").remove();
								this.tempErrorWindow = null;
								this.header.find("div[method='here']").hide();
								Globals.closeIE6Fliter(this.ie6FilterIFrame);
								$("#m_contentend iframe").remove();
							}

						}.bindAsEventListener(this);
						$(document).one("click", this.onOutClickHandler.bind(this));
					},
					onmyLoginKeyDown : function(evt) {
						var element = Event.element(evt);
						var method = element.attr("method");
						switch (method) {
							case "user" : {
								if (evt.keyCode == 9 || evt.keyCode == 13) {
									var realpass = this.myLogin.find("input[method='realpass']");
									if (realpass.val() == realpass.attr("default")) {
										realpass.val("");
									}
									realpass.show();
									this.pass.hide();
									FunctionExt.defer(function() {
										realpass.select();
									}, 100);
								}
							}
								break;
							case "pass" : {
								var realpass = this.myLogin.find("input[method='realpass']");
								if (realpass.val() == realpass.attr("default")) {
									realpass.val("");
								}
								realpass.show();
								realpass.focus();
								this.pass.hide();
							}
								break;
							case "realpass" : {
								if (evt.keyCode == 13) {
									var vcode = this.myLogin.find("li[method='vcode']");
									if (vcode.attr("display") != "none") {
										vcode.find("input").focus();
									} else {
										this.bLogin.click();
									}
								}
							}
							case "txtvcode" : {
								if (evt.keyCode == 13) {
									this.bLogin.click();
								}
							}
								break;
						}
					},
					IsIFlight : function() {
						var url = window.location.href.toLowerCase();
						var isHome = false;
						if ($("#nav_home").attr("class") == "action") {
							isHome = true;
						}
						if (url.indexOf(this.IFlightCn) != -1 || url.indexOf(this.IFlightEn) != -1 || url.indexOf(this.IFlightOnLineEn) != -1
								|| url.indexOf(this.IFlightOnLineCn) != -1 || url.indexOf("hotel.elong.com/index") != -1 || isHome
								|| url.indexOf("hotel.elong.net/index") != -1 || url == "http://hotel.elong.com/" || url == "http://hotel.elong.net/"
								|| (url.indexOf("hotelweb") > -1 && url.indexOf("ab.elong.com") > -1)) {
							return true;
						}
						return false;
					},
					GetRequest : function(strName) {
						var strHref = window.location.href.toLowerCase();
						var intPos = strHref.indexOf("?");
						var strRight = strHref.substr(intPos + 1);
						var arrTmp = strRight.split("&");
						for (var i = 0; i < arrTmp.length; i++) {
							var arrTemp = arrTmp[i].split("=");
							if (arrTemp[0].toUpperCase() == strName.toUpperCase())
								return arrTemp[1];
						}
						return "";
					},
					// 取用户登录信息
					GetUserLogin : function() {
						var params = {
							actiondo : "GetMemberNameInfo",
							loginname : "",
							pwd : "",
							vcode : "",
							isrememberme : false
						};

						var host = "my.elong.com";
						var arr = window.location.host.split(".");
						if (arr.length >= 2) {
							host = String.format("my.{0}.{1}", arr[arr.length - 2], arr[arr.length - 1]);
						}
						var language = window.location.host.toLowerCase().indexOf(".net") >= 0 ? "en" : "cn";
						var loginUrl = String.format("http://{0}/loginproxy_{1}.html", host, language);
						if (window.location.host.toLowerCase().indexOf("travel.elong") >= 0 || window.location.host.toLowerCase().indexOf("travel.net") >= 0) {
							loginUrl = String.format("http://{0}/my/loginproxy_{1}.html", window.location.host, language);
						}
						elongAjax
								.callBack(
										loginUrl,
										params,
										function(res) {
											if (!Object.isNull(res)) {
												if (res.isLogin == "true") {
													var divUserLoginInfo = $("#divUserLoginInfo_elongheader");
													var UserLoginInfo_Cn = new Template(
															"<b>欢迎您, #{UserName}</b><span class='ml5 mr5'>[<a href='http://my.elong.com/logout_cn.html"
																	+ this.GetLogOutUrl("?")
																	+ "'>退出</a>]</span><a href='http://my.elong.com/index_cn.html'>我的帐户</a>|<a href='http://my.elong.com/index_cn.html'>订单管理</a>");
													var UserLoginInfo_En = new Template(
															" <b>Welcome,#{UserName}</b> <span class='ml5 mr5'>[<a href='http://my.elong.net/logout_en.html"
																	+ this.GetLogOutUrl("?")
																	+ "' class='link'>Sign Out</a>]</span><a href='http://my.elong.net/index_en.html'>My Account</a>");
													var UserLoginInfo_OnLine = new Template(
															"<b>欢迎您, #{UserName}</b><span class='ml5 mr5'>[<a href='http://travel.elong.com/my/logout_cn.html?campaign_id=#{CampaignId}"
																	+ this.GetLogOutUrl("&")
																	+ "'>退出</a>]</span><a href='http://travel.elong.com/my/index_cn.html?campaign_id=#{CampaignId}'>我的帐户</a>|<a href='http://travel.elong.com/my/index_cn.html?campaign_id=#{CampaignId}'>订单管理</a>");
													var UserLoginInfo_OnLineEn = new Template(
															" <b>Welcome,#{UserName}</b> <span class='ml5 mr5'>[<a href='http://travel.elong.net/my/logout_en.html?campaign_id=#{CampaignId}"
																	+ this.GetLogOutUrl("&")
																	+ "' class='link'>Sign Out</a>]</span><a href='http://travel.elong.net/my/index_en.html?campaign_id=#{CampaignId}'>My Account</a>");
													var WebSiteType = "Cn";
													var url = window.location.toString().toLowerCase();
													var UserLoginInfo = "";
													var CampaignId = "";
													if (url.indexOf(this.IFlightCn) != -1 || url.indexOf("hotel.elong.com") != -1
															|| (url.indexOf("elong.com") > 0 && $("#nav_home").attr("class") == "action")) {
														WebSiteType = "Cn";
														UserLoginInfo = UserLoginInfo_Cn;
													}
													if (url.indexOf(this.IFlightEn) != -1 || (url.indexOf("elong.net") > 0)) {
														WebSiteType = "En";
														UserLoginInfo = UserLoginInfo_En;
													}
													if (url.indexOf(this.IFlightOnLineEn) != -1) {
														WebSiteType = "OnLineEn";
														UserLoginInfo = UserLoginInfo_OnLineEn;
														CampaignId = this.GetRequest("campaign_id")
													}
													if (url.indexOf(this.IFlightOnLineCn) != -1) {
														WebSiteType = "OnLineCn";
														UserLoginInfo = UserLoginInfo_OnLine;
														CampaignId = this.GetRequest("campaign_id")
													}
													var msg = res.MemberName;
													if (!String.isNullOrEmpty(WebSiteType)) {
														UserLoginInfo = UserLoginInfo.eval({
															UserName : msg,
															CampaignId : CampaignId
														});
													}
													this.divLogin.html(UserLoginInfo);
													this.divLogin.show();
												} else {
													this.divLogin.show();
												}
											} else {
												this.divLogin.show();
											}
										}.bind(this), false, "GET", null, "jsonp");
					},
					initializeUserLoginInfo : function() {
						// if (!this.IsIFlight()) {
						//
						// return;
						// }
						var NeedLogin = this.divLogin.attr("NeedLogin");
						if (NeedLogin != "true") {
							return;
						}
						var arr = window.location.host;
						if (arr.indexOf("travel") >= 0 || arr.indexOf("elong.com") < 0) {
							this.GetUserLogin();
						}
					},
					destroyDOM : function() {
						this.divLogin = null;
						this.elongheader_langs = null;
					},
					destroyEvent : function() {
						this.divLogin.unbind("click");
						this.elongheader_langs.unbind("click");
						this.divLogin.unbind("keydown");
					},
					ShowLoginWindow : function() {
						var language = window.location.host.toLowerCase().indexOf(".net") >= 0 ? "en" : "cn";
						if (language == "cn")
							this.header.find("div[method='here']").html("<span class=\"close right\" title=\"关闭\" method=\"hereclose\"></span>您需要登录才可查看帐户信息。");
						else
							this.header.find("div[method='here']").html(
									"<span class=\"close right\" title=\"Close\" method=\"hereclose\"></span>Please sign in here.");
						this.header.find("div[method='here']").show();
						if (this.outTimer != null) {
							clearTimeout(this.outTimer);
							this.outTimer = null;
						}
						this.myAccount.find("div").addClass("none");
						this.myAccount.find("span").removeClass("on");

						FunctionExt.defer(function() {
							this.header.find("div[method='here']").attr("state", "0");
							this.myLogin.find("div[method='dvlogin']").removeClass("none");
							this.myLogin.find("span[method='mylogin']").addClass("on");
							$(document).unbind("click", this.onOutClick);
							$(document).one("click", this.onOutClick.bind(this));
							this.header.find("div[method='here']").show();

						}.bind(this), 100);
					},

					render : function() {
					},
					onheaderClick : function(evt) {
						var element = Event.element(evt);
						var method = element.attr("method");
						var language = window.location.host.toLowerCase().indexOf(".net") >= 0 ? "en" : "cn";
						var uinfo = this.header.find("div[method='uinfo']");
						switch (method) {
							case "fbill" : {
								if (Object.isNull(uinfo[0])) {
									// this.ShowLoginWindow();
									var url = (language == "cn")
											? ("http://my.elong.com/login_cn.html?nexturl=" + encodeURIComponent("http://my.elong.com/FlightOrder_cn.html"))
											: ("http://my.elong.net/login_en.html?nexturl=" + encodeURIComponent("http://my.elong.net/FlightOrder_en.html"));
									window.location.href = url;
								} else {
									var url = (language == "cn") ? "http://my.elong.com/FlightOrder_cn.html" : " http://my.elong.net/FlightOrder_en.html";
									window.location.href = url;
								}
							}
								break;
							case "hbill" : {
								if (Object.isNull(uinfo[0])) {
									// this.ShowLoginWindow();
									var url = (language == "cn") ? "http://my.elong.com/login_cn.html?nexturl="
											+ encodeURIComponent("http://my.elong.com/HotelOrder_cn.html") : "http://my.elong.net/login_en.html?nexturl="
											+ encodeURIComponent("http://my.elong.net/HotelOrder_en.html");
									window.location.href = url;
								} else {
									var url = (language == "cn") ? "http://my.elong.com/HotelOrder_cn.html" : " http://my.elong.net/HotelOrder_en.html";
									window.location.href = url;
								}
							}
								break;
							case "cash" : {
								if (Object.isNull(uinfo[0])) {
									// this.ShowLoginWindow();
									var url = "http://my.elong.com/login_cn.html?nexturl=" + encodeURIComponent("http://my.elong.com/Cash_cn.html");
									window.location.href = url;

								} else {
									var url = "http://my.elong.com/Cash_cn.html";
									window.location.href = url;
								}
							}
								break;
							case "myaccount" : {
								if (Object.isNull(uinfo[0])) {
									// this.ShowLoginWindow();
									var url = (language == "cn") ? "http://my.elong.com/login_cn.html" : " http://my.elong.net/login_en.html";
									window.location.href = url;
								} else {
									var url = (language == "cn") ? "http://my.elong.com/index_cn.html" : " http://my.elong.net/index_en.html";
									window.location.href = url;
								}
							}
								break;
							case "coupon" : {
								if (Object.isNull(uinfo[0])) {
									// this.ShowLoginWindow();
									var url = "http://my.elong.com/login_cn.html?nexturl=" + encodeURIComponent("http://my.elong.com/Coupon_cn.html");
									window.location.href = url;
								} else {
									var url = "http://my.elong.com/Coupon_cn.html";
									window.location.href = url;
								}
							}
								break;
							case "tuan" : {
								if (Object.isNull(uinfo[0])) {
									// this.ShowLoginWindow();
									var url = "http://my.elong.com/login_cn.html?nexturl=" + encodeURIComponent("http://my.elong.com/GrouponOrder_cn.html");
									window.location.href = url;
								} else {
									var url = "http://my.elong.com/GrouponOrder_cn.html";
									window.location.href = url;
								}
							}
								break;
							case "point" : {
								if (Object.isNull(uinfo[0])) {
									// this.ShowLoginWindow();
									var url = "http://my.elong.net/login_en.html?nexturl=" + encodeURIComponent("http://my.elong.com/point_en.html");
									window.location.href = url;
								} else {
									var url = "http://my.elong.net/point_en.html";
									window.location.href = url;
								}
							}
								break;
							case "savesite" : {
								var ctrl = (navigator.userAgent.toLowerCase()).indexOf('mac') != -1 ? 'Command/Cmd' : 'Ctrl';
								if (document.all) {
									window.external.addFavorite("http://www.elong.com", "艺龙旅行网");
								} else if (window.sidebar) {
									window.sidebar.addPanel("艺龙旅行网", "http://www.elong.com", "艺龙旅行网");
								} else {
									alert('添加失败，请用Ctrl+D进行添加');
								}
							}
								break;
							// 在线客服的处理
							case "olservice" : {
								var channel = this.header.find("#channelMenu li[class='on']");
								if (Object.isNull(channel[0]) || channel.lenght == 0) {
									window.open("http://www.elong.com/chat.html?g=28632", "", "height=460,width=690,left=200,top=100,resizable=yes");
								} else {
									window.open("http://www.elong.com/chat.html?g=" + channel.attr("sid"), "",
											"height=460,width=690,left=200,top=100,resizable=yes");
								}
							}
								break;
							case "user" : {
								if (this.userName.val() == this.userName.attr("default")) {
									this.userName.val("");
								}
							}
								break;
							case "pass" : {
								if (this.pass.val() == this.pass.attr("default")) {
									var realpass = this.myLogin.find("input[method='realpass']");
									this.pass.hide();
									realpass.val("");
									realpass.show();
									realpass.select();
								}
							}
								break;
							// 登录提示信息关闭
							case "hereclose" : {
								this.header.find("div[method='here']").hide();
							}
								break;

							// 英文语言跳转
							case "eng" :
								var host = window.location.host.toLowerCase();
								var url = window.location.href.substring(host.length + 7).toLowerCase();
								switch (host.substring(0, host.indexOf(".elong"))) {
									case "hotel" :
										window.location = "http://" + host.replace(/\.com/, ".net") + url.replace(/_cn/, "_en");
										return;
									case "flight" :
										var furl = url.replace(/_cn/, "_en").replace(/cn_/, "en_");
										window.location = "http://" + host.replace(/\.com/, ".net") + furl;
										return;
									case "iflight" :
										var furl = url.replace(/_cn/, "_en").replace(/cn_/, "en_");
										window.location = "http://" + host.replace(/\.com/, ".net") + furl;
										return;
									case "globalhotel" :
										window.location = "http://globalhotel.elong.net";
										return;
									case "dianping" :
										break;

								}
								if (url.indexOf("/iflight/") == 0) {
									var ifurl = url.replace(/\/cn\//, "/en/").replace(/cn_/, "en_");
									window.location = "http://" + host.replace(/\.com/, ".net") + ifurl;
									return;
								} else if (url.indexOf("/square/") == 0) {
									window.location = "http://" + host.replace(/\.com/, ".net") + url.replace(/\/cn\//, "/en/");
									return;
								}
								window.location = "http://www.elong.net";
								break;
							// 中文语言跳转
							case "chg" :
								var host = window.location.host.toLowerCase();
								var url = window.location.href.substring(host.length + 7).toLowerCase();
								switch (host.substring(0, host.indexOf(".elong"))) {
									case "hotel" :
										window.location = "http://" + host.replace(/\.net/, ".com") + url.replace(/_en/, "_cn");
										return;
									case "flight" :
										var furl = url.replace(/_en/, "_cn").replace(/en_/, "cn_");
										window.location = "http://" + host.replace(/\.net/, ".com") + furl;
										return;
									case "iflight" :
										var furl = url.replace(/_en/, "_cn").replace(/en_/, "cn_");
										window.location = "http://" + host.replace(/\.net/, ".com") + furl;
										return;
									case "globalhotel" :
										window.location = "http://globalhotel.elong.com";
										return;
									case "dianping" :
										break;
									case "big5" :
										if (window.location.href.length > 32) {
											var htturl = "http";
											var surl = htturl + ":/" + "/" + window.location.href.substr(32);
											if (surl.indexOf("#?")) {
												surl = surl.replace("#?", "");
											}
											window.location = surl;
											return;
										}
										break;
								}
								if (url.indexOf("/iflight/") == 0) {
									var ifurl = url.replace(/\/en\//, "/cn/").replace(/en_/, "cn_");
									window.location = "http://" + host.replace(/\.net/, ".com") + ifurl;
									return;
								} else if (url.indexOf("/square/") == 0) {
									window.location = "http://" + host.replace(/\.net/, ".com") + url.replace(/\/en\//, "/cn/");
									return;
								}
								window.location = "http://www.elong.com";
								break;
							case "imgCode" :
								var url = isEn ? String.format("http://my.elong.net/Validate.html?timespan={0}", new Date().getTime()) : String.format(
										"http://my.elong.com/Validate.html?timespan={0}", new Date().getTime());
								if (window.location.host.toLowerCase().indexOf("travel.elong") >= 0
										|| window.location.host.toLowerCase().indexOf("travel.net") >= 0) {
									url = isEn ? String.format("http://travel.elong.net/my/Validate.html?timespan={0}", new Date().getTime()) : String.format(
											"http://travel.elong.com/my/Validate.html?timespan={0}", new Date().getTime());
								}
								this.myLogin.find("img").attr("src", url);
								break;
							// 忘记密码
							case "forgotpass" :

								var isEnSite = window.location.host.indexOf(".net") > 0 ? true : false;
								var userName = (this.userName.val() == this.userName.attr("default")) ? "" : this.userName.val().trim();
								var m_ForgetPwdUrl = '';
								if (!Object.isNull(userName) && userName.trim() != '') {
									m_ForgetPwdUrl = String.format("http://{0}/ForgetPass_{1}_{2}.html", isEnSite ? "my.elong.net" : "my.elong.com", isEnSite
											? "en"
											: "cn", encodeURIComponent(userName));
									if (window.location.host.toLowerCase().indexOf("travel.elong") >= 0) {
										m_ForgetPwdUrl = String.format("http://{0}/my/ForgetPass_{1}_{2}.html?campaign_id={3}", window.location.host, isEnSite
												? "en"
												: "cn", encodeURIComponent(userName), this.GetRequest("campaign_id"));
									}
								} else {
									m_ForgetPwdUrl = String.format("http://{0}/ForgetPass_{1}.html", isEnSite ? "my.elong.net" : "my.elong.com", isEnSite
											? "en"
											: "cn");
									if (window.location.host.toLowerCase().indexOf("travel.elong") >= 0) {
										m_ForgetPwdUrl = String.format("http://{0}/my/ForgetPass_{1}.html?campaign_id={2}", window.location.host, isEnSite
												? "en"
												: "cn", this.GetRequest("campaign_id"));
									}
								}
								window.open(m_ForgetPwdUrl, "_blank");
								break;
							// 处理登录
							case "login" :
								var uid = this.userName;
								var pwd = this.realpass;
								var vcode = this.myLogin.find("li[method='vcode']");
								var btnLogin = this.myLogin.find("input[method='login']");

								var isEn = window.location.host.indexOf("elong.net") > 0 ? true : false;
								var isrememberme = $("#inputRememberMe").attr("checked") ? true : false;
								if (this.userName.val() == this.userName.attr("default")) {
									$error(uid, isEn ? "Please enter your login name." : "登录名不能为空。");
									return;
								}
								if (!validator.valid(uid.val().trim(), "notEmpty & loginName")) {
									$error(uid, isEn ? "Please enter your login name." : "登录名不能为空。");
									return;
								}
								if (!validator.valid(pwd.val(), "notEmpty")) {
									$error(this.pass, isEn ? "Please enter your password." : "密码不能为空。");
									return;
								}
								btnLogin.hide();
								this.myLogin.find("span[method='wait']").show();

								Elong.login(encodeURIComponent(uid.val().trim()), pwd.val(), vcode.find("input").val(), function(res) {
									if (res.MemberLoginCode != 1 && res.IsShowVCode) {
										// 显示验证码输入框
										this.myLogin.find("li[method='vcode']").show();
										var url = isEn ? String.format("http://my.elong.net/Validate.html?timespan={0}", new Date().getTime()) : String.format(
												"http://my.elong.com/Validate.html?timespan={0}", new Date().getTime());
										if (window.location.host.toLowerCase().indexOf("travel.elong") >= 0
												|| window.location.host.toLowerCase().indexOf("travel.net") >= 0) {
											url = isEn ? String.format("http://travel.elong.net/my/Validate.html?timespan={0}", new Date().getTime()) : String
													.format("http://travel.elong.com/my/Validate.html?timespan={0}", new Date().getTime());
										}
										this.myLogin.find("img").attr("src", url);

									}
									// else {
									// this.divLogin.find("span:hidden").hide();
									// }

									switch (res.MemberLoginCode) {
										case 1 :
											var surl = window.location.href;
											while (surl.indexOf("#?") != -1) {
												surl = surl.replace("#?", "");
											}
											window.location = surl;
											return;
										case 100 :
											$error(uid, isEn ? "Username or password does not match!" : "用户名或密码不匹配！");
											break; // 登录名不存在
										case 101 :
											$error(this.pass, isEn ? "You have entered an incorrect password." : "登录密码错误");
											break; // 登录密码错误
										case 102 :
											// $error(this.iptUserID,
											// this.HotelRes.login_err3);
											break; // 匹配了多个用户名,而且用户没有选择卡号
										case 103 :
											$error(uid, isEn ? "This account has been cancelled or frozen." : "用户已经被冻结或取消");
											break; // 用户已经被冻结或取消
										case 104 :
											$error(vcode.find("input"), isEn ? "You have entered an incorrect verification code." : "验证码错误");
											break; // 验证码错误
										default :
											$error(uid, isEn ? "There is an unknown error." : "未知错误");
											break; // 未知错误
									}

									btnLogin.show();
									this.myLogin.find("span[method='wait']").hide();
								}.bind(this), null, isEn, isrememberme);
								break;
						}
					},

					ondivLangMouseOut : function() {
						this.ulLang.hide();
						this.divLang.find("span[method='langtag']").removeClass("on");
					},
					ondivLangMouseOver : function() {
						this.ulLang.show();
						this.divLang.find("span[method='langtag']").addClass("on");
					},

					onmyAccountMouseOver : function() {
						this.myLogin.find("div[method='dvlogin']").addClass("none");
						this.myLogin.find("span[method='mylogin']").removeClass("on");
						this.myAccount.find("div").removeClass("none");
						this.myAccount.find("span").addClass("on");
					},
					onmyAccountMouseOut : function() {
						this.myAccount.find("div").addClass("none");
						this.myAccount.find("span").removeClass("on");
					},

					onmyLoginMouseOver : function() {
						if (this.outTimer != null) {
							clearTimeout(this.outTimer);
							this.outTimer = null;
						}

						this.myLogin.find("div[method='dvlogin']").removeClass("none");
						this.myLogin.find("span[method='mylogin']").addClass("on");

						// 设置大小位置

						var winElement = this.myLogin.find("div[method='dvlogin']");
						var popTag = this.myLogin.find("span[method='mylogin']");
						var top = popTag.offset().top + popTag.height() + 6;
						var left = popTag.offset().left;
						this.ie6FilterIFrame = Globals.addIE6Filter(winElement.width(), winElement.height(), left, top, 750);

						if (this.header.find("div[method='here']").attr("state") == "1") {
							this.header.find("div[method='here']").hide();
						}
						FunctionExt.defer(this.onOutClick.bindAsEventListener(this), 100);
					},
					onmyLoginMouseOut : function() {

						if (this.userName.val() == this.userName.attr("default") && this.pass.val() == this.pass.attr("default")) {
							this.outTimer = FunctionExt.defer(function() {
								this.myLogin.find("div[method='dvlogin']").addClass("none");
								this.myLogin.find("span[method='mylogin']").removeClass("on");
								$("#m_contentend").find("div[class='com_bug']").remove();
								this.tempErrorWindow = null;
								this.bLogin.show();
								this.myLogin.find("span[method='wait']").hide();
								this.header.find("div[method='here']").hide();
								Globals.closeIE6Fliter(this.ie6FilterIFrame);
								$("#m_contentend iframe").remove();
							}.bind(this), 1000, this);
						}
					},
					onuserNameMouseOut : function() {
						if (String.isNullOrEmpty(this.userName.val())) {
							this.userName.val(this.userName.attr("default"));
						}
					},
					onrealpassMouseOut : function() {
						var realpass = this.myLogin.find("input[method='realpass']");
						if (String.isNullOrEmpty(this.realpass.val())) {
							this.pass.show();
							realpass.hide();
						}
					},
					onbLoginMouseOver : function() {
						this.bLogin.removeClass("btn_on");
					},
					onbLoginMouseOut : function() {
						this.bLogin.removeClass("btn_on");
					},
					onbLoginMouseDown : function() {
						this.bLogin.addClass("btn_on");
					},
					InitLanguage : function() {
						var isBig5 = false;
						if (window.location.href.indexOf("big5.elong.com") > -1) {
							isBig5 = true;
						}

						var url = window.location.href;
						if (isBig5) {
							url = url.substr(32);
							this.divLang.find("a[method='langtag']").text("繁體版");
							this.ulLang.find("li[method='libig5']").remove();
							this.ulLang.find("li[method!='libig5']").show();
						} else {
							var host = window.location.host.toLowerCase();
							if (host.indexOf("elong.net") != -1) {
								this.divLang.find("a[method='langtag']").text("English");
								this.ulLang.find("li[method='lien']").remove();
								this.ulLang.find("li[method!='lien']").show();
								url = "http://big5.elong.com/gate/big5/www.elong.com";
							} else {
								this.divLang.find("a[method='langtag']").text("简体版");
								this.ulLang.find("li[method='licn']").remove();
								this.ulLang.find("li[method!='licn']").show();
								url = "http://big5.elong.com/gate/big5/" + url.substr(7);
							}
							this.ulLang.find("li[method='libig5'] a").attr("href", url);
						}
					},
					bindMouseEvnt : function() {
						this.myAccount.bind("mouseover", this.onmyAccountMouseOver.bindAsEventListener(this));
						this.myAccount.bind("mouseout", this.onmyAccountMouseOut.bindAsEventListener(this));
						this.myLogin.bind("mouseover", this.onmyLoginMouseOver.bindAsEventListener(this));
						this.myLogin.bind("mouseout", this.onmyLoginMouseOut.bindAsEventListener(this));
					},

					GetLogOutUrl : function(splitChar) {
						var url = "";
						if (typeof (PageSwitch) != "undefined") {
							if (PageSwitch.IsLogOutDIY == "1") {
								url = splitChar + "nexturl=" + encodeURIComponent(PageSwitch.LogOutUrl)
							}
						}
						return url;
					},

					// 取用户登录信息
					GetLoginState : function() {
						var params = {
							actiondo : "GetMemberNameInfo",
							loginname : "",
							pwd : "",
							vcode : "",
							isrememberme : false
						};
						var checkhost = window.location.host;
						if (checkhost.indexOf("travel") >= 0 || checkhost.indexOf("elong") < 0)
							return;
						if (!this.CheckCahcePage()) {
							// this.bindMouseEvnt();
							return;
						}
						var host = "my.elong.com";
						var arr = window.location.host.split(".");
						if (arr.length >= 2) {
							host = String.format("my.{0}.{1}", arr[arr.length - 2], arr[arr.length - 1]);
						}
						var language = window.location.host.toLowerCase().indexOf(".net") >= 0 ? "en" : "cn";
						var loginUrl = String.format("http://{0}/loginproxy_{1}.html", host, language);
						if (window.location.host.toLowerCase().indexOf("travel.elong") >= 0 || window.location.host.toLowerCase().indexOf("travel.net") >= 0) {
							loginUrl = String.format("http://{0}/my/loginproxy_{1}.html", window.location.host, language);
						}
						elongAjax
								.callBack(
										loginUrl,
										params,
										function(res) {
											if (!Object.isNull(res)) {
												if (res.isLogin == "true") {
													var divUserLoginInfo = $("#header div[method='dvAccount']");
													divUserLoginInfo.find("div[method='reg']").remove();
													divUserLoginInfo.find("div[method='mylogin']").remove();
													divUserLoginInfo.find("div[method='uinfo']").remove();

													var UserLoginInfo_Cn = new Template(
															" <div class=\"box\" method=\"uinfo\"><span class=\"name normal\"><span class=\"pr15\">欢迎您，#{UserName}</span><a href=\"http://my.elong.com/logout_cn.html\""
																	+ this.GetLogOutUrl("?") + " title=\"安全退出艺龙帐户\">退出</a></span></div>");
													var UserLoginInfo_En = new Template(
															" <div class=\"box en\" method=\"uinfo\"><span class=\"name normal\"><span class=\"pr15\">Welcome，#{UserName}</span><a href=\"http://my.elong.net/logout_en.html\""
																	+ this.GetLogOutUrl("?") + " title=\"Sign Out\">Sign Out</a></span></div>");
													var UserLoginInfo_OnLine = new Template(
															"<b>欢迎您, #{UserName}</b><span class='ml5 mr5'>[<a href='http://travel.elong.com/my/logout_cn.html?campaign_id=#{CampaignId}'>退出</a>]</span><a href='http://travel.elong.com/my/index_cn.html?campaign_id=#{CampaignId}'"
																	+ this.GetLogOutUrl("&")
																	+ ">我的帐户</a>|<a href='http://travel.elong.com/my/index_cn.html?campaign_id=#{CampaignId}'>订单管理</a>");
													var UserLoginInfo_OnLineEn = new Template(
															" <b>Welcome,#{UserName}</b> <span class='ml5 mr5'>[<a href='http://travel.elong.net/my/logout_en.html?campaign_id=#{CampaignId}' class='link'>Sign Out</a>]</span><a href='http://travel.elong.net/my/index_en.html?campaign_id=#{CampaignId}'"
																	+ this.GetLogOutUrl("&") + ">My Account</a>");
													var WebSiteType = "Cn";
													var url = window.location.toString().toLowerCase();
													var UserLoginInfo = "";
													var CampaignId = "";
													if (url.indexOf("elong.com") != -1 && url.indexOf("travel") < 0) {
														WebSiteType = "Cn";
														UserLoginInfo = UserLoginInfo_Cn;
													}
													if (url.indexOf("elong.net") != -1 && url.indexOf("travel") < 0) {
														WebSiteType = "En";
														UserLoginInfo = UserLoginInfo_En;
													}
													if (url.indexOf("travel.elong.net") != -1) {
														WebSiteType = "OnLineEn";
														UserLoginInfo = UserLoginInfo_OnLineEn;
														CampaignId = this.GetRequest("campaign_id")
													}
													if (url.indexOf("travel.elong.com") != -1 || url.indexOf("elong") < 0) {
														WebSiteType = "OnLineCn";
														UserLoginInfo = UserLoginInfo_OnLine;
														CampaignId = this.GetRequest("campaign_id")
													}
													var msg = res.MemberName;
													if (!String.isNullOrEmpty(WebSiteType)) {
														UserLoginInfo = UserLoginInfo.eval({
															UserName : msg,
															CampaignId : CampaignId
														});
													}
													$(UserLoginInfo).appendTo(divUserLoginInfo);
													// this.divLogin.show();
												} else {
													var divUserLoginInfo = $("#header div[method='dvAccount']");
													divUserLoginInfo.find("div[method='uinfo']").remove();
													divUserLoginInfo.find("div[method='reg']").show();
													divUserLoginInfo.find("div[method='mylogin']").show();
												}
											} else {
												this.divLogin.show();
											}
										}.bind(this), false, "GET", null, "jsonp");
					},

					// --------------------------------------------------------

					checkBig5 : function() {
						var isBig5 = false;
						if (window.location.href.indexOf("big5.elong.com") > -1) {
							isBig5 = true;
						}
						if (this.elongheader_langs.length <= 0) {
							return;
						}
						var url = window.location.href;
						if (isBig5) {
							url = url.substr(32);
							this.elongheader_langs[0].innerHTML += '<a href="#?" mth="chg" id="mimg_bg_cn"   ></a>';
						} else {
							var host = window.location.host.toLowerCase();
							if (host.indexOf("elong.net") != -1) {
								url = "http://big5.elong.com/gate/big5/www.elong.com";
							} else {
								url = "http://big5.elong.com/gate/big5/" + url.substr(7);
							}
							this.elongheader_langs[0].innerHTML += '<a href="' + url + '" id="mimg_bg_big5"   ></a>';
						}
					},

					onClickelongheader_langs : function(evt) {
						var element = Event.element(evt);
						var method = element.attr("mth");
						switch (method) {
							case "eng" :
								var host = window.location.host.toLowerCase();
								var url = window.location.href.substring(host.length + 7).toLowerCase();
								switch (host.substring(0, host.indexOf(".elong"))) {
									case "hotel" :
										window.location = "http://" + host.replace(/\.com/, ".net") + url.replace(/_cn/, "_en");
										return;
									case "flight" :
										var furl = url.replace(/_cn/, "_en").replace(/cn_/, "en_");
										window.location = "http://" + host.replace(/\.com/, ".net") + furl;
										return;
									case "iflight" :
										var furl = url.replace(/_cn/, "_en").replace(/cn_/, "en_");
										window.location = "http://" + host.replace(/\.com/, ".net") + furl;
										return;
									case "globalhotel" :
										window.location = "http://globalhotel.elong.net";
										return;
									case "dianping" :
										break;

								}
								if (url.indexOf("/iflight/") == 0) {
									var ifurl = url.replace(/\/cn\//, "/en/").replace(/cn_/, "en_");
									window.location = "http://" + host.replace(/\.com/, ".net") + ifurl;
									return;
								} else if (url.indexOf("/square/") == 0) {
									window.location = "http://" + host.replace(/\.com/, ".net") + url.replace(/\/cn\//, "/en/");
									return;
								}
								window.location = "http://www.elong.net";
								break;
							case "chg" :
								var host = window.location.host.toLowerCase();
								var url = window.location.href.substring(host.length + 7).toLowerCase();
								switch (host.substring(0, host.indexOf(".elong"))) {
									case "hotel" :
										window.location = "http://" + host.replace(/\.net/, ".com") + url.replace(/_en/, "_cn");
										return;
									case "flight" :
										var furl = url.replace(/_en/, "_cn").replace(/en_/, "cn_");
										window.location = "http://" + host.replace(/\.net/, ".com") + furl;
										return;
									case "iflight" :
										var furl = url.replace(/_en/, "_cn").replace(/en_/, "cn_");
										window.location = "http://" + host.replace(/\.net/, ".com") + furl;
										return;
									case "globalhotel" :
										window.location = "http://globalhotel.elong.com";
										return;
									case "dianping" :
										break;
									case "big5" :
										if (window.location.href.length > 32) {
											var htturl = "http";
											var surl = htturl + ":/" + "/" + window.location.href.substr(32);
											if (surl.indexOf("#?")) {
												surl = surl.replace("#?", "");
											}
											window.location = surl;
											return;
										}
										break;
								}
								if (url.indexOf("/iflight/") == 0) {
									var ifurl = url.replace(/\/en\//, "/cn/").replace(/en_/, "cn_");
									window.location = "http://" + host.replace(/\.net/, ".com") + ifurl;
									return;
								} else if (url.indexOf("/square/") == 0) {
									window.location = "http://" + host.replace(/\.net/, ".com") + url.replace(/\/en\//, "/cn/");
									return;
								}
								window.location = "http://www.elong.com";
								break;
						}
					},

					onKeyDowndivLogin : function(evt) {
						if (evt.keyCode == 13) {
							this.divLogin.find("input[mth='login']").click();
							return false;
						}
					},

					onMouseOverdivLogin : function(evt) {
						var element = Event.element(evt);
						var method = element.attr("mth");
						switch (method) {
							case "user" :
								var divRem = this.divLogin.find("div[mth='elongheader_Reminder']:hidden");
								if (divRem.length > 0) {
									divRem.show();
									FunctionExt.defer(function() {
										divRem.fadeOut("slow");
									}.bind(this), 3000);
								}
								break;
						}
					},

					onClickdivLogin : function(evt) {
						var element = Event.element(evt);
						var method = element.attr("mth");

						if (element.attr("mth") != "user") {
							this.divLogin.find("div[mth='elongheader_Reminder']:visible").fadeOut("slow");
						}
						if (element.attr("mth") != "otherMem") {
							this.divLogin.find("ul[mth='divOtherMem']:visible").hide();
						}

						switch (method) {
							case "findPwd" :
								var isEnSite = window.location.host.indexOf(".net") > 0 ? true : false;
								var userName = this.divLogin.find("input.user").val().trim();
								var m_ForgetPwdUrl = '';
								if (!Object.isNull(userName) && userName.trim() != '') {
									m_ForgetPwdUrl = String.format("http://{0}/ForgetPass_{1}_{2}.html", isEnSite ? "my.elong.net" : "my.elong.com", isEnSite
											? "en"
											: "cn", encodeURIComponent(userName));
									if (window.location.host.toLowerCase().indexOf("travel.elong") >= 0) {
										m_ForgetPwdUrl = String.format("http://{0}/my/ForgetPass_{1}_{2}.html?campaign_id={3}", window.location.host, isEnSite
												? "en"
												: "cn", encodeURIComponent(userName), this.GetRequest("campaign_id"));
									}
								} else {
									m_ForgetPwdUrl = String.format("http://{0}/ForgetPass_{1}.html", isEnSite ? "my.elong.net" : "my.elong.com", isEnSite
											? "en"
											: "cn");
									if (window.location.host.toLowerCase().indexOf("travel.elong") >= 0) {
										m_ForgetPwdUrl = String.format("http://{0}/my/ForgetPass_{1}.html?campaign_id={2}", window.location.host, isEnSite
												? "en"
												: "cn", this.GetRequest("campaign_id"));
									}
								}
								window.open(m_ForgetPwdUrl, "_blank");
								break;
							case "user" :
								var divRem = this.divLogin.find("div[mth='elongheader_Reminder']:hidden");
								if (divRem.length > 0) {
									divRem.show();
									FunctionExt.defer(function() {
										divRem.fadeOut("slow");
									}.bind(this), 3000);
								}
								break;
							case "otherMem" :
								this.divLogin.find("ul[mth='divOtherMem']").show();
								FunctionExt.defer(function() {
									this.divLogin.find("ul[mth='divOtherMem']").hide();
								}.bind(this), 6000);
								break;
							case "imgCode" :
								var url = isEn ? String.format("http://my.elong.net/Validate.html?timespan={0}", new Date().getTime()) : String.format(
										"http://my.elong.com/Validate.html?timespan={0}", new Date().getTime());
								if (window.location.host.toLowerCase().indexOf("travel.elong") >= 0
										|| window.location.host.toLowerCase().indexOf("travel.net") >= 0) {
									url = isEn ? String.format("http://travel.elong.net/my/Validate.html?timespan={0}", new Date().getTime()) : String.format(
											"http://travel.elong.com/my/Validate.html?timespan={0}", new Date().getTime());
								}
								this.divLogin.find("img").attr("src", url);
								break;
							case "login" :
								var uid = this.divLogin.find("input.user");
								var pwd = this.divLogin.find("input.password");
								var vcode = this.divLogin.find("input.Code");
								var btnLogin = this.divLogin.find("input[mth='login']");
								var isEn = window.location.host.indexOf("elong.net") > 0 ? true : false;
								var isrememberme = $("#inputRememberMe").attr("checked") ? true : false;
								if (!validator.valid(uid.val().trim(), "notEmpty & loginName")) {
									$error(uid, isEn ? "Please enter your login name." : "登录名不能为空。");
									return;
								}
								if (!validator.valid(pwd.val(), "notEmpty")) {
									$error(pwd, isEn ? "Please enter your password." : "密码不能为空。");
									return;
								}

								btnLogin[0].className = "Login_loding";
								btnLogin.attr("disabled", "disabled");
								Elong.login(encodeURIComponent(uid.val().trim()), pwd.val(), vcode.val(), function(res) {
									if (res.MemberLoginCode != 1 && res.IsShowVCode) {
										// 显示验证码输入框
										this.divLogin.find("span:hidden").show();
										var url = isEn ? String.format("http://my.elong.net/Validate.html?timespan={0}", new Date().getTime()) : String.format(
												"http://my.elong.com/Validate.html?timespan={0}", new Date().getTime());
										if (window.location.host.toLowerCase().indexOf("travel.elong") >= 0
												|| window.location.host.toLowerCase().indexOf("travel.net") >= 0) {
											url = isEn ? String.format("http://travel.elong.net/my/Validate.html?timespan={0}", new Date().getTime()) : String
													.format("http://travel.elong.com/my/Validate.html?timespan={0}", new Date().getTime());
										}
										this.divLogin.find("img").attr("src", url);
										$("span[mth='servicehelp']").hide();
										$("a[mth='servicehelp']").hide();
									}
									// else {
									// this.divLogin.find("span:hidden").hide();
									// }

									switch (res.MemberLoginCode) {
										case 1 :
											var surl = window.location.href;
											while (surl.indexOf("#?") != -1) {
												surl = surl.replace("#?", "");
											}
											window.location = surl;
											return;
										case 100 :
											$error(uid, isEn ? "Username or password does not match!" : "用户名或密码不匹配！");
											break; // 登录名不存在
										case 101 :
											$error(pwd, isEn ? "You have entered an incorrect password." : "登录密码错误");
											break; // 登录密码错误
										case 102 :
											// $error(this.iptUserID,
											// this.HotelRes.login_err3);
											break; // 匹配了多个用户名,而且用户没有选择卡号
										case 103 :
											$error(uid, isEn ? "This account has been cancelled or frozen." : "用户已经被冻结或取消");
											break; // 用户已经被冻结或取消
										case 104 :
											$error(vcode, isEn ? "You have entered an incorrect verification code." : "验证码错误");
											break; // 验证码错误
										default :
											$error(uid, isEn ? "There is an unknown error." : "未知错误");
											break; // 未知错误
									}
									btnLogin[0].className = "Login";
									btnLogin.removeAttr("disabled");
								}.bind(this), null, isEn, isrememberme);
								break;
						}
					},

					dispose : function() {
						this.destroyEvent();
						this.destroyDOM();
					}
				});

// ==================================================================
// 文件名: smallLoginDialog.js
// 版权: Copyright (C) 2011 Elong
// 创建人: kui.chen
// 创建日期: 2011-3-1
// 描述: Elong整站业务公共脚本类
// 备注:
// 示例代码：
// var dialog=new smallLoginDialog({
// isShowNoCardButton:true,//是否显示直接预订按钮，True显示，False不显示
// language:"cn", // cn|en
// isRemember:false //是否记住我 ture|fasle
// nexturl:null,//登录或注册的后的NextURl,当传入NextUrL时，登录、注册完成后会自动跳转到下一个NextUrl
// callback:function(res){登录后回调函数，res==1登录成功，res==2直接预订登录成功，其他登录失败。需要注意的是当调用此回调方法时，登录完成后,不会再跳转NextUrL,需要在回调中自己跳转
// if(res=="1"||res=="2")
// {
// //登录成功后处理代码
// var rn = Math.random();
// document.PackageForm.action = nextPage + "?rn=" + Math.random();
// document.PackageForm.submit();
// }
// }
// });
//
//
// ===================================================================
var smallLoginDialog = Elong.smallLoginDialog;
smallLoginDialog = Class.create();
Object
		.extend(
				smallLoginDialog.prototype,
				{
					name : "loginDialog",
					m_Container_cn : new Template(
							"<div id='SmallLonginContain'><div  class='com_dialog-content com_widget-content'><div class='package_login' ><div id='smallDialog_login'><dl class='bdr'><dt class='t14 bold pb15'> 已是艺龙会员 </dt><dd class='errorBox none'></dd><dd>用户名 / 卡号 / 手机号 / 邮箱：</dd><dd><input type='text' class='w207'  method='uid'/></dd><dd class='mt10'>密码：</dd><dd><input type='password' class='w134' method='psw'/><a href='#?' method='forgetpwd'>忘记密码？</a></dd><dl style='display:none; margin:0; padding:0;' id='valCode'><dd class='mt20'>验证码：<input class='w40' type='text' method='Code'><img  class='middle mr5' method='imgRefresh' /><a href='#?' method='refreshCode'>刷新验证码？</a></dd></dl><dd class='pt10' method='remberDiv'><input name='' type='checkbox' value=''  method='remberMe'/> 下次自动登录<span class='l_black'>(保存2个月)</span></dd><dd class='mt20'><input type='button' value='登录' onfocus='this.blur()'  class='search_bt' method='login'></dd><dd class='mt15' method='QQDiv'><span class='ltenpayIcon'></span><a href='#{TenyPayLogin}'>QQ/财付通会员登录</a></dd></dl><dl class='noMember' id='RegDiv'><dt class='t14 bold'> 不是艺龙会员？ </dt><dd class='tc mt20 pt20'><a href='#?' method='reg' class='t14 bold ml10'>注册新帐户</a><br /><br /><span id='showNoCard'><input type='button' value='直接预订'  method='nocardbooking' onfocus='this.blur()'  class='btn_book'></span></dd></dl><div class='clear'></div></div><div class='loadingBox '  id='loading' style='display:none;'>登录中...<div class='loading'></div></div></div></div></div>"),
					m_Container_en : new Template(
							"<div id='SmallLonginContain'><div  class='com_dialog-content com_widget-content'><div class='package_login' ><div id='smallDialog_login'><dl class='bdr'><dt class='t14 bold pb15'> Already a registered user  </dt><dd class='errorBox none'></dd><dd>User name / Card number / Email:</dd><dd><input type='text' class='w207'  method='uid'/></dd><dd class='mt10'>Password:</dd><dd><input type='password' class='w134' method='psw'/><a href='#?' #{findPsd} method='forgetpwd'>Forgot your password?</a></dd><dl style='display:none; margin:0; padding:0;' id='valCode'><dd class='mt20'>verification code:<input class='w40' type='text' method='Code'><img  class='middle mr5' method='imgRefresh' /><a href='#?' method='refreshCode'>refresh the codes?</a></dd></dl><dd class='pt10'  method='remberDiv'><input name='' type='checkbox' value=''  method='remberMe'/> Login automatically next time<span class='l_black'>(save two months)</span></dd><dd class='mt20'><input type='button' value='Sign&nbsp;in' onfocus='this.blur()'  class='search_bt' method='login'></dd></dl><dl class='noMember' id='RegDiv'><dt class='t14 bold'> New user?  </dt><dd class='tc mt20 pt20'><a href='#?'  method='reg' class='t14 bold ml10'>Sign up now</a> <br /><br /><span id='showNoCard'><input type='button' value='Book as guest'  method='nocardbooking' onfocus='this.blur()'  class='btn_book'></span></dd></dl><div class='clear'></div></div><div class='loadingBox '  id='loading' style='display:none;'>Loading...<div class='loading'></div></div></div></div></div>"),
					loginEmpty_cn : "登录名不能为空",
					loginEmpty_en : "Please enter your login name.",
					passwordEmpty_cn : "密码不能为空",
					passwordEmpty_en : "Please enter your password.",
					loginError_100_cn : "用户名或密码不匹配！",
					loginError_100_en : "Username or password does not match!",
					loginError_101_cn : "登录密码错误",
					loginError_101_en : "You have entered an incorrect password.",
					loginError_103_cn : "用户已经被冻结或取消",
					loginError_103_en : "This account has been cancelled or frozen.",
					loginError_104_cn : "验证码错误",
					loginError_104_en : "You have entered an incorrect verification code.",
					loginDefaultError_cn : "未知错误",
					loginDefaultError_en : "There is an unknown error.",
					diaglog : null,
					validateUrl : null,
					isRememberMe : false,

					options : {
						isShowNoCardButton : true,
						language : "cn",
						isRemember : false,
						nexturl : null,
						campaign_id : null,
						RegShow : true,
						title : "登录",
						width : 550,
						callback : null

					},

					initialize : function(options) {
						Object.extend(Object.extend(this, this.options), options);

						this.options.title = this.language.toLowerCase() == "cn" ? "登录" : "Login";

						var m_TenyPayLogin = String
								.format("http://www.elong.com/redirect/bdlogin.aspx?islogin=1&bdfrom=503&Iswindow=0&nextUrl=http://my.elong.com/index_cn.html?bdfrom=503");
						// var m_RegUrl =
						// String.format("http://{0}/register_{1}.html",
						// "my.elong.com", this.language.toLowerCase() == "cn" ?
						// "cn" : "en");

						if (window.location.host.toLowerCase().indexOf("travel.elong") >= 0) {
							this.validateUrl = String.format("http://{0}/my/Validate.html?timespan={1}", window.location.host, new Date().getTime());

							m_TenyPayLogin = String
									.format("http://www.elong.com/redirect/bdlogin.aspx?islogin=1&bdfrom=503&Iswindow=0&nextUrl=http://my.elong.com/index_cn.html?bdfrom=503");
							// m_RegUrl =
							// String.format("http://{0}/my/register_{1}.html",
							// window.location.host, this.language.toLowerCase()
							// == "cn" ? "cn" : "en");
						}
						// this.validateUrl =
						// String.format("http://{0}/Validate.html",
						// this.language.toLowerCase() == "cn" ?
						// "my.elong.com":"my.elong.net");
						this.diaglog = new Dialog(Object.extend(this.options, {
							htmlContent : this.language.toLowerCase() == "cn" ? this.m_Container_cn.eval({
								TenyPayLogin : m_TenyPayLogin
							}) : this.m_Container_en.eval({
								findPsd : ""
							}),
							initEvent : function(window) {
								this.initializeDOM();
								if (this.isRemember) {
									this.RememberInput.attr("checked", true);
									this.isRememberMe = true;
									Elong.GetUserInfo(function(res) {
										if (!Object.isNull(res)) {
											if (res.isLogin == "true") {
												if (res.Mobile.trim() != '-1') {
													this.UserIdText.attr("value", res.Mobile);
													this.UserIdText.attr("readonly", true);
												} else {
													if (res.Email.trim() != '-1') {
														this.UserIdText.attr("value", res.Email);
														this.UserIdText.attr("readonly", true);
													} else {
														this.UserIdText.attr("value", res.CardNo);
														this.UserIdText.attr("readonly", true);
													}
												}
											}
										}
									}.bind(this));
								}
								if (!this.RegShow) {
									this.RegDiv.hide();
								} else {
									this.RegDiv.show();
								}
								if (!this.isShowNoCardButton) {
									this.showNocard.hide();
								} else {
									this.showNocard.show();
								}
								// 联盟不展示记住我，不展示财富通登录
								if (!String.isNullOrEmpty(this.campaign_id)) {
									this.SmallLonginContain.find("dd[method='remberDiv']").hide();
									this.SmallLonginContain.find("dd[method='QQDiv']").hide();
								} else {
									this.SmallLonginContain.find("dd[method='remberDiv']").show();
									this.SmallLonginContain.find("dd[method='QQDiv']").show();
								}
								window.bind("keydown", function(evt) {
									if (evt.keyCode == 13) {
										this.login();
										return false;
									}
								}.bind(this));
								window.bind("click", function(evt) {
									var element = Event.element(evt);
									var method = element.attr("method");
									switch (method) {
										case "forgetpwd" :
											var userName = this.UserIdText.val();
											var m_ForgetPwdUrl = '';
											if (!Object.isNull(userName) && userName.trim() != '') {
												m_ForgetPwdUrl = String.format("http://{0}/ForgetPass_{1}_{2}.html", this.language.toLowerCase() == "cn"
														? "my.elong.com"
														: "my.elong.net", this.language.toLowerCase() == "cn" ? "cn" : "en", encodeURIComponent(userName));
												if (document.location.host.toLowerCase().indexOf("travel.elong") >= 0) {
													m_ForgetPwdUrl = String.format("http://{0}/my/ForgetPass_{1}_{2}.html?Campaign_id={3}",
															document.location.host, this.language.toLowerCase() == "cn" ? "cn" : "en",
															encodeURIComponent(userName), this.campaign_id);
												}
											} else {
												m_ForgetPwdUrl = String.format("http://{0}/ForgetPass_{1}.html", this.language.toLowerCase() == "cn"
														? "my.elong.com"
														: "my.elong.net", this.language.toLowerCase() == "cn" ? "cn" : "en");
												if (document.location.host.toLowerCase().indexOf("travel.elong") >= 0) {
													m_ForgetPwdUrl = String.format("http://{0}/my/ForgetPass_{1}.html?Campaign_id={3}", document.location.host,
															this.language.toLowerCase() == "cn" ? "cn" : "en", this.campaign_id);
												}
											}
											document.location.href = m_ForgetPwdUrl;
											break;
										case "login" :
											this.login();
											break;
										case "nocardbooking" :
											this.NoCardBooking();
											break;
										case "reg" :
											this.RegClick();
											break;
										case "Code" :
											// var imgSrc =
											// String.format("http://{0}/Validate.html?timespan={1}",
											// this.language.toLowerCase() ==
											// "cn" ? "my.elong.com" :
											// "my.elong.net", new
											// Date().getTime());
											// this.SmallLonginContain.find("img").attr("src",
											// imgSrc);
											break;
										case "imgRefresh" :
											var imgSrc = String.format("http://{0}/Validate.html?timespan={1}", this.language.toLowerCase() == "cn"
													? "my.elong.com"
													: "my.elong.net", new Date().getTime());
											if (document.location.host.toLowerCase().indexOf("travel.elong") >= 0) {
												imgSrc = String
														.format("http://{0}/my/Validate.html?timespan={1}", document.location.host, new Date().getTime());
											}

											this.SmallLonginContain.find("img").attr("src", imgSrc);
											break;
										case "refreshCode" :
											var refreshUrl = String.format("http://{0}/Validate.html?timespan={1}", this.language.toLowerCase() == "cn"
													? "my.elong.com"
													: "my.elong.net", new Date().getTime());
											if (document.location.host.toLowerCase().indexOf("travel.elong") >= 0) {
												refreshUrl = String.format("http://{0}/my/Validate.html?timespan={1}", document.location.host, new Date()
														.getTime());
											}

											this.SmallLonginContain.find("img").attr("src", refreshUrl);
											break;
										case "remberMe" :
											if (element.attr("checked") == true) {
												this.isRememberMe = true;
											} else {
												this.isRememberMe = false;
											}
											break;
										case "close" :
											this.dispose();
											break;
									}
								}.bind(this));
							}.bind(this)
						}));
						this.render();
					},
					RegClick : function() {
						// var m_TenyPayLogin =
						// String.format("http://www.elong.com/redirect/bdlogin.aspx?islogin=1&bdfrom=503&Iswindow=0&nextUrl=http://my.elong.com/index_cn.html?bdfrom=503");
						var m_RegUrl = String.format("http://{0}/register_{1}.html", "my.elong.com", this.language.toLowerCase() == "cn" ? "cn" : "en");

						if (window.location.host.toLowerCase().indexOf("travel.elong") >= 0) {
							// this.validateUrl =
							// String.format("http://{0}/my/Validate.html?timespan={1}",
							// window.location.host, new Date().getTime());

							// m_TenyPayLogin =
							// String.format("http://www.elong.com/redirect/bdlogin.aspx?islogin=1&bdfrom=503&Iswindow=0&nextUrl=http://my.elong.com/index_cn.html?bdfrom=503");
							m_RegUrl = String.format("http://{0}/my/register_{1}.html?Campaign_id={2}", window.location.host,
									this.language.toLowerCase() == "cn" ? "cn" : "en", this.campaign_id);
						}
						if (!Object.isNull(this.nexturl)) {
							if (m_RegUrl.indexOf("?") >= 0) {
								m_RegUrl = String.format(m_RegUrl + "&nexturl={0}", this.nexturl);
							} else {
								m_RegUrl = String.format(m_RegUrl + "?nexturl={0}", this.nexturl);
							}

						}
						document.location.href = m_RegUrl;
					},

					login : function() {
						if (!validator.valid(this.uid.val().trim(), "notEmpty & loginName")) {
							$error(this.uid, this.language.toLowerCase() == "cn" ? this.loginEmpty_cn : this.loginEmpty_en);
							return;
						}
						if (!validator.valid(this.pwd.val(), "notEmpty")) {
							$error(this.pwd, this.language.toLowerCase() == "cn" ? this.passwordEmpty_cn : this.passwordEmpty_en);
							return;
						}
						// btnLogin[0].className = "Login_loding";
						this.showLoading();
						Elong.login(encodeURIComponent(this.uid.val().trim()), this.pwd.val(), this.vcode.val(), function(res) {
							if (res.MemberLoginCode != 1 && res.IsShowVCode) {
								// 显示验证码输入框
								this.valCodeDiv.show();
								var validateUrl = String.format("http://{0}/Validate.html?timespan={1}", this.language.toLowerCase() == "cn"
										? "my.elong.com"
										: "my.elong.net", new Date().getTime());
								this.SmallLonginContain.find("img").attr("src", validateUrl);
							} else {
								this.valCodeDiv.hide();
							}
							switch (res.MemberLoginCode) {
								case 1 :
									$("div[class^='com_dialog-titlebar']").remove();
									$("div[class^='com_dialog-content']").remove();
									$("div[class^='com_dialog com_widget com_widget-content com_corner-all com_draggable']").remove();
									Object.isNull(this.callback) ? window.location.href = this.nexturl : this.callback(res.MemberLoginCode);

									return;
								case 100 :
									this.hideLoading();
									$error(this.uid, this.language.toLowerCase() == "cn" ? this.loginError_100_cn : this.loginError_100_en);
									break; // 登录名不存在
								case 101 :
									this.hideLoading();
									$error(this.pwd, this.language.toLowerCase() == "cn" ? this.loginError_101_cn : this.loginError_101_en);
									break; // 登录密码错误
								case 102 :
									// this.hideLoading();
									// $error(this.iptUserID,
									// this.HotelRes.login_err3);
									break; // 匹配了多个用户名,而且用户没有选择卡号
								case 103 :
									this.hideLoading();
									$error(this.uid, this.language.toLowerCase() == "cn" ? this.loginError_103_cn : this.loginError_103_en);
									break; // 用户已经被冻结或取消
								case 104 :
									this.hideLoading();
									$error(this.vcode, this.language.toLowerCase() == "cn" ? this.loginError_104_cn : this.loginError_104_en);
									break; // 验证码错误
								default :
									this.hideLoading();
									$error(this.uid, this.language.toLowerCase() == "cn" ? this.loginDefaultError_cn : this.loginDefaultError_en);
									break; // 未知错误
							}
						}.bind(this), null, this.language.toLowerCase() == "cn" ? false : true, this.isRememberMe);
						this.dispose();

					},
					NoCardBooking : function() {
						this.showLoading();
						Elong.login("", "", "", function(res) {
							var isEn = false;
							switch (res.MemberLoginCode) {
								case 2 :
									$("div[class^='com_dialog-titlebar']").remove();
									$("div[class^='com_dialog-content']").remove();
									$("div[class^='com_dialog com_widget com_widget-content com_corner-all com_draggable']").remove();
									Object.isNull(this.callback) ? window.location.href = this.nexturl : this.callback(res.MemberLoginCode);
									return;
								default :
									this.hideLoading();
									// $error(this.uid, isEn ? "There is an
									// unknown error." : "未知错误");
									break; // 未知错误
							}

							// } .bind(this), null, isEn, isrememberme);
						}.bind(this), null, this.language.toLowerCase() == "cn" ? false : true, false);
						this.dispose();

					},
					showLoading : function() {
						this.btnLogin.attr("disabled", "disabled");
						this.smallDialog_login.hide();
						this.loading.show();
					},
					hideLoading : function() {
						this.smallDialog_login.show();
						this.loading.hide();
						this.btnLogin.removeAttr("disabled");
					},
					initializeDOM : function() {
						this.SmallLonginContain = $("#SmallLonginContain");
						this.smallDialog_login = $("#smallDialog_login");
						this.showNocard = $("#showNoCard");
						this.RegDiv = $("#RegDiv");
						this.uid = $("#SmallLonginContain").find("input[method='uid']");
						this.pwd = $("#SmallLonginContain").find("input[method='psw']");
						this.vcode = $("#SmallLonginContain").find("input[method='Code']");
						this.btnLogin = $("#SmallLonginContain").find("input[method='login']");
						this.loading = $("#loading");
						this.valCodeDiv = $("#valCode");
						this.RememberInput = $("#SmallLonginContain").find("input[method='remberMe']");
						this.UserIdText = $("#SmallLonginContain").find("input[method='uid']");
					},

					destroyDOM : function() {

					},

					initializeEvent : function() {

					},

					destroyEvent : function() {

					},

					render : function() {

						this.diaglog.show();

					},
					dispose : function() {
						this.diaglog = null;
					}
				});

$(document).ready(function() {
	var client = new ElongHeaderControl();
	// 后加载elong广告呈现
	Elong.renderAds();
	Elong.recordSEOKeyWord();
	Elong.flowStatiData();
});
// 弹出框登录函数
// isShowNoCardButton:true,//是否显示直接预订按钮，True显示，False不显示
// language:"cn", // cn|en
// isRemember:false //是否记住我 ture|fasle
// nexturl:null,//登录或注册的后的NextURl,当传入NextUrL时，登录、注册完成后会自动跳转到下一个NextUrl
// campaign_id:"4209079",联盟的campaign_id值，主站默认传""即可
// callback:function(res){登录后回调函数，res==1登录成功，res==2直接预订登录成功，其他登录失败。需要注意的是当调用此回调方法时，登录完成后,不会再跳转NextUrL,需要在回调中自己跳转
// RegShow:ture, 是否展示注册链接ture|false
function $loginDialog(language, isShowNoCardButton, isRememberMe, nexturl, campaign_id, callback, RegShow) {
	var dialog = new smallLoginDialog({
		isShowNoCardButton : Object.isNull(isShowNoCardButton) ? true : isShowNoCardButton, // 是否显示直接预订按钮，True显示，False不显示
		language : language, // cn|en
		isRemember : Object.isNull(isRememberMe) ? false : isRememberMe,
		nexturl : nexturl,
		campaign_id : String.isNullOrEmpty(campaign_id) ? null : campaign_id,
		callback : callback,
		RegShow : Object.isNull(RegShow) ? true : RegShow
	});
};// ===================================================================
// 文件名: validator09.js
// 版权: Copyright (C) 2009 Elong
// 创建人: zhi.Luo
// 创建日期: 2009-10-14
// 描述: Js通用校验类库
// 备注: 此文件修改请通知作者

// 示例代码:
// 不需要new ValidatorClass类，validator对象可直接使用
// validator.valid(txtInput.value, "notEmpty & real");
// validator.valid(txtInput.value, "notEmpty & textRange", 5, 20);
// validator.valid(txtInput.value, "notEmpty & dateRange", "2001-1-1",
// "2009-1-1");

// validator.getTodayString() // 获取今天yyyy-mm-dd
// validator.reFormatDateString(value) 格式化日期，将2009-1-1或12/31/2009都格式化成yyyy-mm-dd
// validator.reFormatDateStringEn(value)格式化日期，将2009-1-1都格式化成mm/dd/yyyy
// validator.convertDate(dateString) 传入2009-1-1或1/1/2009转化成Date对象
// ===================================================================

var ValidatorClass = Elong.Utility.ValidatorClass = Class.create();
Object.extend(ValidatorClass.prototype, {
	name : "ValidatorClass",
	// 初始化
	initialize : function() {
	},

	validType : {
		notEmpty : null,
		email : /^\w+((-\w+)|(\.\w+))*\@{1}\w+((-\w+)|(\.\w+))*\.{1}\w{2,4}(\.{0,1}\w{2,4}){0,4}$/,
		// 字符串
		textRange : 20, // 校验字符长度，validator.valid(txtInput.value, "textRange",
						// 5, 20);
		loginName : /[^@]+@{1}[^@\.]+\.+[^@]+|[0-9a-zA-Z\u4e00-\u9fa5]*/,
		passengerName : /^[a-zA-Z]{1,20}\/[a-zA-Z]{1,20}((| )[a-zA-Z]{1,20}){0,20}$/, // 乘机人姓名Luo/zhi或者Luoz/asf
																						// sdf或者asfd/asd/ad
		nickName : /^([a-zA-Z]|[\u4e00-\u9fa5]|\/| )+$/, // 联系人姓名不能包含数字与符号
		enString : /^[a-zA-Z]+$/, // 验证是否只包含英文字符
		cnString : /^[\u4e00-\u9fa5]+$/, // 验证是否全部包含中文字符
		nonSpecialSign : /^[^~!@#$%^&*！￥…\s，。]*$/, // 不包含特殊字符
		// 日期
		date : null, // 判断是否是日期格式yyyy-mm-dd
		dateEn : null, // 判断是否是日期格式mm/dd/yyyy
		dateRange : null, // 判断是否在日前区间内，validator.valid(txtInput.value,
							// "dateRange", "2001-1-1", "2009-1-1");
		// 文件名
		fileName : /^[a-z]:(\\[^\\\/:\*\?"><|]+)*\\?$/i,
		directoryName : /^[a-z]:(\\[^\\\/:\*\?"><|]+)+$/i,
		picFileName : /\.(jpg)|(jpeg)|(png)|(gif)$/i,
		attachFileName : /\.(doc)|(xls)|(txt)|(zip)|(rar)$/i,
		// 数字
		number : /^\d+$/, // 数字
		zipCode : /^\d{6}$/, // 邮编
		idCard : null, // 验证身份证有效性
		year : /^[1-2][0-9]{3}$/, // 年代
		integer : /^-?[0-9]{1,9}$/, // 整数
		// positiveInteger: /^[1-9][0-9]{0,10}$/,
		// notNegativeInteger: /^(0|([1-9][0-9]{0,10}))$/,
		real : /^-?[0-9]{1,28}(\.[0-9]*)?$/,
		// positiveReal: /^\d+(\.\d+)?$/,
		// notNegativeReal: /^(0|(\d+(\.\d+)?))$/,
		phone : /^\d{3,4}-\d{7,8}((\s|;)+\d{3,4}-\d{7,8})*$/,
		mobile : /^1[0-9]{10}$/, // 以13|15|18开头的11数字
		money : /^[0-9]{1,11}(\.[0-9]{1,2})?$/
	// 钱

	},

	// ///////////////////////////////////////////////////
	// 说明：校验通用方法
	// 参数：value： 需要校验的值
	// validTyp: 需要校验的类型，格式如："notEmpty & real"
	// params: 其他参数
	// 示例：validator.valid(txtInput.value, "notEmpty & real");
	// ///////////////////////////////////////////////////
	valid : function(value, validType, params) {
		if (arguments.length < 2) {
			alert("validator.valid()缺少参数");
		}

		var result = true;

		var arrValidateType = validType.trim().split("&");
		for (var i = 0; i < arrValidateType.length; i++) {
			if (!result)
				return false;

			var type = arrValidateType[i].trim();
			switch (type) {
				case "notEmpty" :
					result = !String.isNullOrEmpty(value);
					break;
				case "textRange" :
					if (arguments.length < 4) {
						return false;
					}
					result = this.validateTextLength(value, arguments[2], arguments[3]);
					break;
				case "idCard" :
					result = this.validateIDCard(value);
					break;
				case "date" :
					result = this.validateDate(value);
					break;
				case "dateEn" :
					result = this.validateDate(this.reFormatDateString(value));
					break;
				case "dateRange" :
					if (arguments.length < 4 && !this.validateDate(value)) {
						return false;
					}
					result = this.validateDateRange(value, arguments[2], arguments[3]);
					break;
				default :
					result = this.regularValidate(value, this.validType[type]);
					break;
			}
		}

		return result;
	},

	validateIDCard : function(sNo) {
		sNo = sNo.toString()
		if (sNo.length == 18) {
			var a, b, c
			if (!this.valid(sNo.substr(0, 17), "number")) {
				return false
			}
			a = parseInt(sNo.substr(0, 1)) * 7 + parseInt(sNo.substr(1, 1)) * 9 + parseInt(sNo.substr(2, 1)) * 10;
			a = a + parseInt(sNo.substr(3, 1)) * 5 + parseInt(sNo.substr(4, 1)) * 8 + parseInt(sNo.substr(5, 1)) * 4;
			a = a + parseInt(sNo.substr(6, 1)) * 2 + parseInt(sNo.substr(7, 1)) * 1 + parseInt(sNo.substr(8, 1)) * 6;
			a = a + parseInt(sNo.substr(9, 1)) * 3 + parseInt(sNo.substr(10, 1)) * 7 + parseInt(sNo.substr(11, 1)) * 9;
			a = a + parseInt(sNo.substr(12, 1)) * 10 + parseInt(sNo.substr(13, 1)) * 5 + parseInt(sNo.substr(14, 1)) * 8;
			a = a + parseInt(sNo.substr(15, 1)) * 4 + parseInt(sNo.substr(16, 1)) * 2;
			b = a % 11;
			if (b == 2) {
				c = sNo.substr(17, 1).toUpperCase();
			} else {
				c = parseInt(sNo.substr(17, 1));
			}

			switch (b) {
				case 0 :
					if (c != 1) {
						return false;
					}
					break;
				case 1 :
					if (c != 0) {
						return false;
					}
					break;
				case 2 :
					if (c != "X") {
						return false;
					}
					break;
				case 3 :
					if (c != 9) {
						return false;
					}
					break;
				case 4 :
					if (c != 8) {
						return false;
					}
					break;
				case 5 :
					if (c != 7) {
						return false;
					}
					break;
				case 6 :
					if (c != 6) {
						return false;
					}
					break;
				case 7 :
					if (c != 5) {
						return false;
					}
					break;
				case 8 :
					if (c != 4) {
						return false;
					}
					break;
				case 9 :
					if (c != 3) {
						return false;
					}
					break;
				case 10 :
					if (c != 2) {
						return false
					}
			}
		} else {
			if (!this.valid(sNo, "number")) {
				return false
			}
		}

		switch (sNo.length) {
			case 15 :
				var date = "19" + sNo.substr(6, 2) + "-" + sNo.substr(8, 2) + "-" + sNo.substr(10, 2);
				return this.valid(date, "date");
			case 18 :
				var str = sNo.substr(6, 4) + "-" + sNo.substr(10, 2) + "-" + sNo.substr(12, 2);
				return this.valid(str, "date");
		}
		return false
	},

	validateTextLength : function(value, minLen, maxLen) {
		var len = value.trim().bytelength();
		if (Object.isNull(minLen)) {
			minLen = 0;
		}
		if (Object.isNull(maxLen)) {
			maxLen = 9999999;
		}

		return (len >= minLen) && (len <= maxLen);
	},

	validateDateRange : function(value, minDate, maxDate) {
		if (Object.isNull(minDate)) {
			minDate = "0001-01-01";
		}
		if (Object.isNull(maxDate)) {
			maxDate = "9999-12-31";
		}

		return this.reFormatDateString(value) >= this.reFormatDateString(minDate) && this.reFormatDateString(value) <= this.reFormatDateString(maxDate);
	},

	regularValidate : function(value, reg) {
		reg.lastIndex = -1;
		if (value.length > 0) {
			return reg.test(value);
		}

		return true;
	},

	/* 验证为正确的日期格式 */
	validateDate : function(value) {
		if (!this.regularValidate(value, /^\d{4}-\d{1,2}-\d{1,2}$/)) {
			return false;
		}

		var iaMonthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
		var iaDate = new Array(3)
		var year, month, day

		var result = true;
		var strValue = value;
		if (strValue.length != 0) {
			iaDate = strValue.split("-")
			if (iaDate.length != 3 || iaDate[1].length > 2 || iaDate[2].length > 2 || iaDate[1].length < 1 || iaDate[2].length < 1) {
				result = false;
			}

			year = parseInt(iaDate[0], 10);
			month = parseInt(iaDate[1], 10);
			day = parseInt(iaDate[2], 10);

			if (isNaN(year) || isNaN(month) || isNaN(day)) {
				result = false;
			}

			if (year < 1900 || year > 2100) {
				result = false;
			}

			if (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0))
				iaMonthDays[1] = 29;
			if (month < 1 || month > 12 || day < 1 || day > iaMonthDays[month - 1]) {
				result = false;
			}
		} else
			result = false;

		return result;
	},

	/* 把日期字符串格式化成 yyyy-mm-dd格式 ，便于比较大小 */
	reFormatDateString : function(dateStr) {
		var dateArray = new Array(3);
		var year, month, day;

		if (dateStr.length == 0)
			return '';

		if (dateStr.indexOf("-") > -1) {
			dateArray = dateStr.split("-");
			if (dateArray.length != 3) {
				return "";
			}
			year = dateArray[0];
			month = dateArray[1];
			day = dateArray[2];
		} else {
			dateArray = dateStr.split("/");
			if (dateArray.length != 3) {
				return "";
			}
			year = dateArray[2];
			month = dateArray[0];
			day = dateArray[1];
		}

		if (year.length <= 2)
			year = '19' + year;
		if (month.length == 1)
			month = '0' + month;
		if (day.length == 1)
			day = '0' + day;
		return year + '-' + month + '-' + day;
	},

	/* 把日期yyyy-mm-dd字符串格式化成 mm/dd/yyyy格式 */
	reFormatDateStringEn : function(dateStr) {
		var dateArray = new Array(3);
		var year, month, day;

		if (dateStr.length == 0)
			return "";

		if (dateStr.indexOf("-") > -1) {
			dateArray = dateStr.split("-");
			if (dateArray.length != 3) {
				return "";
			}
			year = dateArray[0];
			month = dateArray[1];
			day = dateArray[2];

		}

		if (year.length <= 2)
			year = '20' + year;
		if (month.length == 1)
			month = '0' + month;
		if (day.length == 1)
			day = '0' + day;
		return month + "/" + day + "/" + year;
	},

	// 获得当前日期，用于比较
	getTodayString : function() {
		var d = new Date();
		return this.getDateString(d);
	},

	getDateString : function(dateObj) {
		var month = dateObj.getMonth() + 1;
		var day = dateObj.getDate();
		var monthStr = month > 9 ? month.toString() : '0' + month.toString();
		var dayStr = day > 9 ? day.toString() : '0' + day.toString();
		var result = dateObj.getFullYear().toString() + '-' + monthStr + '-' + dayStr;
		return result;
	},
	// 传入2009-1-1或1/1/2009转化成Date对象
	convertDate : function(dateString) {
		if (dateString.length == 0)
			return null;
		var str = this.reFormatDateString(dateString);
		var year, month, day;

		if (str.indexOf("-") > -1) {
			var dateArray = str.split("-");
			if (dateArray.length != 3) {
				return null;
			}
			year = dateArray[0];
			month = dateArray[1];
			day = dateArray[2];
		}
		return new Date(year, parseInt(month, 10) - 1, day);
	}
});
var validator = new ValidatorClass();

;// =============================================================================
// 文件名: TipWindow.js
// 版权: Copyright (C) 2009 Elong
// 创建人: zhi.luo
// 创建日期: 2009-8-25
// 描述: TipWindow
// 备注: 1. onmouseover弹出带角提示框、2. 提供$error(element, msg)方法，弹出错误提示框
// 示例代码:
// if (this.showChildTip == null || this.showChildTip.windowElement == null) {
// this.showChildTip = new TipWindow({
// htmlContent: "<div>testest</div>",
// eventElement: $(input),
// initEvent: function(window){
// window.bind("change", this.onMouseOutElement.bindAsEventListener(this));
// window.bind("click", this.onMouseOutElement.bindAsEventListener(this));
// }.bind(this),
// width: 400
// });
// }
// this.showChildTip = new TipWindow({
// htmlContent: "<div>testest</div>",
// buildHtmlContent: function(currWindow) {
// // 这里异步获取数据或html
// //...
// currWindow.htmlContent = html;
// currWindow.show();
// } .bind(this),
// width: 400,
// height: 170
// });
// // 错误提示框
// $error($(input), "请输入名称");
// $error($(input), "请输入名称", "left"); //提示框靠左
// =============================================================================
var TipWindow = Elong.Control.TipWindow;
TipWindow = Class.create();

Object
		.extend(
				TipWindow.prototype,
				{
					name : "TipWindow",
					template : new Template(
							"<div class=\"com_way\" style=\"display:none; position: absolute; z-index: 2010;width: #{width}px;#{height}\"><div m=\"z\" class=\"z\" style=\"width: #{twidth}px;\"></div><div m=\"bj\" class=\"bj\"></div><div class=\"clear\"></div><div class=\"bk\" style=\"width: #{cwidth}px;#{cheight}\"><div class=\"bk_1\" style=\"width: #{bwidth}px; #{bheight}\">#{content}</div></div><div m=\"nz\" class=\"none\" style=\"width: #{twidth}px;\"></div><div m=\"nbj\" class=\"none\"></div><div class=\"clear\"></div></div>"),

					options : {
						htmlContent : "", // 呈现html内容
						eventElement : null, // 触发事件object
						buildHtmlContent : null, // 构造显示内容事件，用于异步获得显示内容时
						width : 381, // 窗口宽度
						height : 0, // 窗口高度，不设置则为自适应
						defer : false, // 是否延迟出现
						autoClose : true, // 是否鼠标移开自动关闭
						floatType : null, // 是否固定位置：leftTop，
											// leftBottom，rightTop，rightBottom，null(自动判断位置)
						initEvent : function() {
						} // bind窗口内元素的事件, 参数windowElement为窗口父元素:
							// function(windowElement){}
					},

					// 初始化
					initialize : function(options) {
						Object.extend(Object.extend(this, this.options), options);

						// mouseover时鼠标停留一定时间才弹出
						this.eventElement.bind("mouseout", this.onMouseOutElement.bindAsEventListener(this));
						if (this.defer) {
							this.showTimer = FunctionExt.defer(function() {
								if (!Object.isNull(this.buildHtmlContent)) {
									this.buildHtmlContent(this);
								} else {
									this.show();
								}
								clearTimeout(this.showTimer);
								this.showTimer = null;
							}, 300, this);
						} else {
							if (!Object.isNull(this.buildHtmlContent)) {
								this.buildHtmlContent(this);
							} else {
								this.show();
							}
						}
					},

					show : function() {
						this.initializeDOM();
						this.initializeEvent();
						this.render();
						this.initEvent(this.windowElement);
					},

					initializeDOM : function() {
						this.contentEndRegion = $("#m_contentend");
						var content = this.template.eval({
							width : this.width,
							height : this.height == 0 ? "" : String.format("height:{0}px;", this.height),
							twidth : this.width - 29,
							cwidth : this.width - 2,
							cheight : this.height == 0 ? "" : String.format("height:{0}px;", this.height - 8),
							bwidth : this.width - 32,
							bheight : this.height == 0 ? "" : String.format("height:{0}px;", this.height - 36),
							content : this.htmlContent
						});
						this.windowElement = $(content).appendTo(this.contentEndRegion);
					},

					destroyDOM : function() {
						this.htmlContent = "";
						this.windowElement = null;
						this.eventElement = null;
						this.contentEndRegion = null;
					},

					initializeEvent : function() {
						this.windowElement.bind("mouseout", this.onMouseOutRegion.bindAsEventListener(this));
						this.windowElement.bind("mouseover", this.onMouseOverRegion.bindAsEventListener(this));
						FunctionExt.defer(this.onOutClick.bindAsEventListener(this), 100);
					},

					destroyEvent : function() {
						$(document).unbind("click", this.onOutClickHandler);
						this.windowElement.unbind("mouseout");
						this.windowElement.unbind("mouseover");
						this.eventElement.unbind("mouseout");
					},

					onMouseOutElement : function() {
						if (this.showTimer != null) {
							clearTimeout(this.showTimer);
							this.showTimer = null;
							this.eventElement.unbind("mouseout");
							// this.dispose();
						}
						// 自动消失
						this.setOutTimer();
					},

					onMouseOverRegion : function(evt) {
						if (this.outTimer != null) {
							clearTimeout(this.outTimer);
							this.outTimer = null;
						}
					},

					onMouseOutRegion : function(evt) {
						this.setOutTimer();
					},

					setOutTimer : function() {
						this.outTimer = FunctionExt.defer(function() {
							if (this.autoClose) {
								this.close();
							}
						}.bind(this), 1, this);
					},

					onOutClick : function() {
						this.onOutClickHandler = function(evt) {
							var element = Event.element(evt);
							if (element.index(this.eventElement) == 0) {
								$(document).one("click", this.onOutClickHandler);
							} else if (this.windowElement.find(":descendant").index(element) == -1) {
								if (this.autoClose) {
									this.close();
								}
							}
						}.bindAsEventListener(this);
						$(document).one("click", this.onOutClickHandler);
					},

					render : function() {
						// 设置大小位置
						var top, left;
						var showZone = this.getWindowZone(this.eventElement, this.windowElement);
						showZone = Object.isNull(this.floatType) ? showZone : this.floatType;
						switch (showZone) {
							case "leftTop" :
								top = this.eventElement.offset().top - this.windowElement.height();
								left = this.eventElement.offset().left - this.width + this.eventElement.width() / 2 + 24;
								this.windowElement.find("div[m='z']").attr("class", "none");
								this.windowElement.find("div[m='bj']").attr("class", "none");
								this.windowElement.find("div[m='nz']").attr("class", "z_br");
								this.windowElement.find("div[m='nbj']").attr("class", "bj_br");
								this.windowElement.find("div.bk").attr("class", "bk_top");
								this.windowElement.find("div.bk_1").attr("class", "bk_top_1");
								break;
							case "leftBottom" :
								top = this.eventElement.offset().top + this.eventElement.height() + 3;
								left = this.eventElement.offset().left - this.width + this.eventElement.width() / 2 + 24;
								break;
							case "rightTop" :
								top = this.eventElement.offset().top - this.windowElement.height();
								left = this.eventElement.offset().left + this.eventElement.outerWidth() / 2 - 24;
								this.windowElement.find("div[m='z']").attr("class", "none");
								this.windowElement.find("div[m='bj']").attr("class", "none");
								this.windowElement.find("div[m='nz']").attr("class", "z_bl");
								this.windowElement.find("div[m='nbj']").attr("class", "bj_bl");
								this.windowElement.find("div.bk").attr("class", "bk_top");
								this.windowElement.find("div.bk_1").attr("class", "bk_top_1");
								break;
							case "rightBottom" :
								top = this.eventElement.offset().top + this.eventElement.height() + 3;
								left = this.eventElement.offset().left + this.eventElement.outerWidth() / 2 - 24;
								this.windowElement.find("div[m='z']").attr("class", "z_tl");
								this.windowElement.find("div[m='bj']").attr("class", "bj_tl");
								this.windowElement.find("div[m='nz']").attr("class", "none");
								this.windowElement.find("div[m='nbj']").attr("class", "none");
								break;
						}

						this.windowElement[0].style.top = top + "px";
						this.windowElement[0].style.left = left + "px";
						this.ie6FilterIFrame = Globals.addIE6Filter(this.windowElement.width() + 10, this.windowElement.height(), left, top);
						this.windowElement.fadeIn("normal");

					},

					getWindowZone : function(eventElement, windowElement) {
						var zone = {
							leftTop : "leftTop",
							leftBottom : "leftBottom",
							rightTop : "rightTop",
							rightBottom : "rightBottom"
						};
						var scroll = Globals.getScrollPosition();
						var browserRegion = Globals.browserDimensions();
						var isRight = true;
						if (browserRegion.width - (eventElement.offset().left - scroll.x) < windowElement.width()
								&& eventElement.offset().left - scroll.x > windowElement.width()) {
							isRight = false;
						}

						if (isRight) {
							if (browserRegion.height - (eventElement.offset().top - scroll.y) > windowElement.height()) {
								return zone.rightBottom
							} else if (eventElement.offset().top - scroll.y > windowElement.height()) {
								return zone.rightTop;
							} else {
								return zone.rightBottom
							}
						} else {
							if (browserRegion.height - (eventElement.offset().top - scroll.y) > windowElement.height()) {
								return zone.leftBottom
							} else if (eventElement.offset().top - scroll.y > windowElement.height()) {
								return zone.leftTop;
							} else {
								return zone.leftBottom
							}
						}
					},

					// getPageDimensions: function() {
					// var pageDimensions = { width: 0, height: 0 };
					// var xScroll, yScroll;
					// if (window.innerHeight && window.scrollMaxY) {
					// xScroll = document.body.scrollWidth;
					// yScroll = window.innerHeight + window.scrollMaxY;
					// } else if (document.body.scrollHeight >
					// document.body.offsetHeight) {
					// xScroll = document.body.scrollWidth;
					// yScroll = document.body.scrollHeight;
					// } else {
					// xScroll = document.body.offsetWidth;
					// yScroll = document.body.offsetHeight;
					// }

					// var windowWidth, windowHeight;
					// if (self.innerHeight) {
					// windowWidth = self.innerWidth;
					// windowHeight = self.innerHeight;
					// } else if (document.documentElement &&
					// document.documentElement.clientHeight) {
					// windowWidth = document.documentElement.clientWidth;
					// windowHeight = document.documentElement.clientHeight;
					// } else if (document.body) {
					// windowWidth = document.body.clientWidth;
					// windowHeight = document.body.clientHeight;
					// }

					// if (yScroll < windowHeight) {
					// pageDimensions.height = windowHeight;
					// } else {
					// pageDimensions.height = yScroll;
					// }

					// if (xScroll < windowWidth) {
					// pageDimensions.width = windowWidth;
					// } else {
					// pageDimensions.width = xScroll;
					// }
					// return pageDimensions;
					// },

					close : function() {
						this.dispose();
					},

					dispose : function() {
						if (this.windowElement) {
							this.windowElement.fadeOut("normal");
							FunctionExt.defer(function() {
								if (this.windowElement) {
									Globals.closeIE6Fliter(this.ie6FilterIFrame);
									this.windowElement.remove();
									this.destroyEvent();
									this.destroyDOM();
								}
							}.bind(this), 500);
						}
					}
				});

var ErrorTipWindow = Elong.Control.ErrorTipWindow;
ErrorTipWindow = Class.create();

Object.extend(ErrorTipWindow.prototype, {
	name : "ErrorTipWindow",
	templateRegion : "<div style=\"display:none; position: absolute; z-index: 5000; \" class=\"com_bug\"><div class=\"w\">{0}</div></div>",

	options : {
		errorMsg : "", // 错误信息
		align : "right", // 布局：right,left
		eventElement : null
	// 触发事件object
	},

	// 初始化
	initialize : function(options) {
		Object.extend(Object.extend(this, this.options), options);
		this.align = String.isNullOrEmpty(this.align) ? "right" : this.align;
		this.initializeDOM();
		this.initializeEvent();

		this.render();
	},

	initializeDOM : function() {
		this.contentEndRegion = $("#m_contentend");
		this.windowElement = $(String.format(this.templateRegion, this.errorMsg)).appendTo(this.contentEndRegion);
	},

	destroyDOM : function() {
		this.errorMsg = "";
		this.windowElement = null;
		this.eventElement = null;
		this.contentEndRegion = null;
	},

	initializeEvent : function() {
		// this.windowElement.bind("mouseout",
		// this.onMouseOutRegion.bindAsEventListener(this));
		// this.windowElement.bind("mouseover",
		// this.onMouseOverRegion.bindAsEventListener(this));
		FunctionExt.defer(this.onOutClick.bindAsEventListener(this), 100);
	},

	destroyEvent : function() {
		$(document).unbind("click", this.onOutClickHandler);
		this.windowElement.unbind("mouseout");
		this.windowElement.unbind("mouseover");
	},

	onOutClick : function() {
		this.onOutClickHandler = function(evt) {
			var element = Event.element(evt);
			if (this.windowElement.find(":descendant").index(element) == -1) {
				this.dispose();
			} else {
				$(document).one("click", this.onOutClickHandler);
			}
		}.bindAsEventListener(this);
		$(document).one("click", this.onOutClickHandler);
	},

	onMouseOverRegion : function(evt) {
		var element = Event.element(evt);
		if (this.outTimer != null) {
			clearTimeout(this.outTimer);
			this.outTimer = null;
		}
	},

	onMouseOutRegion : function(evt) {
		var element = Event.element(evt);
		this.outTimer = FunctionExt.defer(function() {
			this.dispose();
		}, 10, this);
	},

	render : function() {
		// 设置大小位置
		var top = this.eventElement.offset().top + this.eventElement.height() - 17;
		var left = this.eventElement.offset().left + this.eventElement.width() + 5;
		this.windowElement[0].style.top = top + "px";
		if (this.align.toLowerCase() == "right") {
			this.windowElement[0].style.left = left + "px";
		} else {
			left = this.eventElement.offset().left - this.windowElement.width() - 5;
			this.windowElement[0].style.left = left + "px";
		}
		this.ie6FilterIFrame = Globals.addIE6Filter(this.windowElement.width(), this.windowElement.height(), left, top);
		this.windowElement.show();
		this.scrollToCenter(this.eventElement);

		this.eventElement.addClass("com_ErrorBox");
		if (this.eventElement.is("input")) {
			this.eventElement.select();
		}
	},
	// 滚动到屏幕中间
	scrollToCenter : function(element) {
		var scroll = Globals.getScrollPosition();
		var browserSize = Globals.browserDimensions();
		if (element.offset().top < scroll.y) {
			window.scrollTo(scroll.x, element.offset().top - browserSize.height / 2);
		}
	},

	dispose : function() {
		if (this.windowElement) {
			this.windowElement.hide();
			this.eventElement.removeClass("com_ErrorBox");
			FunctionExt.defer(function() {
				if (this.windowElement) {
					Globals.closeIE6Fliter(this.ie6FilterIFrame);
					this.windowElement.remove();
					this.destroyEvent();
					this.destroyDOM();
				}
			}.bind(this), 500);
		}
	}
});

function $error(element, msg, align) {
	if (Object.isNull(this.tempErrorWindow) || Object.isNull(this.tempErrorWindow.windowElement)) {
		this.tempErrorWindow = new ErrorTipWindow({
			errorMsg : msg,
			align : align,
			eventElement : element
		});
	} else {
		element.addClass("com_ErrorBox");
		element.one("click", function(evt) {
			FunctionExt.defer(function() {
				if (Object.isNull(msg))
					return;
				if (Object.isNull(this.tempErrorWindow) || Object.isNull(this.tempErrorWindow.windowElement)) {
					this.tempErrorWindow = new ErrorTipWindow({
						errorMsg : msg,
						align : align,
						eventElement : element
					});
				}
			}.bind(this), 600);
		}.bind(this));
	}
};// ===================================================================
// 文件名: CitySuggests.js
// 版权: Copyright (C) 2010 Elong
// 创建人: weiliang.li
// 创建日期: 2011-1-13
// 描述: 城市输入框
// 备注:
// 示例代码：
//
// 基本用法
// var city = new CityWindow({
// eventElement:$("#txtCity"),
// cityType:"flightsrc",
// lang:"cn",
// resultNextId:"txtTime1",
// onSelect:function(evt,data){
// //处理选中后的事件
// alert(data.CityNameCn);
// }
// });
//
// 所有参数说明：
//             
// eventElement: 弹出城市输入框的元素;
// lang: 当前语言， 值： cn,en ;
// resultNextId: 选中后焦点需要移动的元素Id,
// cityType: 城市输入框的搜索类型，值：
// flightsrc,flightdest,flightall,iflightdest,iflightsrc,iflightall,hotel,ihotel,hotelall,packagesrc,packagedest,packageall,iflightcountry;
// hotType: 热门城市搜索类型，默认与cityType相同 ；
// onSelect: null, 当选中城市的时候执行的操作，默认传入参数为 （eventElement,selectCity）
// onClose:null, 当搜索窗口关闭的时候的执行的时间 默认传入参数为（eventElement，windowElement）
// hotWidth: 320,热门城市框的宽度
// hotHeight: 138, 热门城市框的高度
// delay:50, 搜索延迟的时间，默认是50ms
// maxLen: 搜索返回的结果数，默认为10
// enableSearch:true, 是否支持搜索，默认为True
// isJsonp:0, 是否支持Jsonp 0，不支持，1，支持
// searchUrl:"http://hotel.elong.com/city/" 支持Jsonp的时候，请求的服务地址。
//
//
// 对eventElement 的附加信息：
//
// eventElement.attr("cityid"); 获取选中城市的城市ID
// eventElement.attr("citythreesign"); 获取选中城市的三字码
// eventElement.get(0).City 获取选中城市的所有信息。
// ===================================================================
var CityPad = Elong.Control.CityPad;
CityPad = Class.create();
Object
		.extend(
				CityPad.prototype,
				{
					name : "CityPad",
					timeout : null,
					errtimeout : null,
					selectCity : null,
					KeyCode : {
						Left : 37,
						Up : 38,
						Right : 39,
						Down : 40,
						Del : 46,
						Tab : 9,
						Return : 13,
						Esc : 27,
						Command : 188,
						PageUp : 33,
						PageDown : 34,
						BackSpace : 8,
						Tab : 9
					},
					m_Container : new Template(
							"<div style=\"width:#{HotWidth}px;display:block \" class=\"com_hotresults\"><div style=\"width:100%;\"><div class=\"ac_title\">#{HotTitle}</div><ul method=\"hotTab\" class=\"AbcSearch clx\">#{HotTab}</ul><ul method=\"hotData\" class=\"popcitylist#{Language}\" style=\"overflow: auto; max-height: 260px;\">#{HotData}</ul></div><div class=\"clear\"></div><div class=\"com_cbox_b com_cbox_lt\"></div><div class=\"com_cbox_b com_cbox_rt\"></div><div class=\"com_cbox_b com_cbox_lb\"></div><div class=\"com_cbox_b com_cbox_rb\"></div><div class=\"clear\"></div></div>"),
					m_Result : new Template(
							"<div style=\"width: 230px;position:relative;\" class=\"com_results\"><div style=\"width: 100%;\"><div class=\"ac_title\">#{ResultTitleHtml}</div><ul method=\"cityData\" style=\"overflow: auto; max-height: 260px;\">#{ResultDataHtml}</ul></div><div class=\"clear\"></div><div class=\"com_cbox_b com_cbox_lt\"></div><div class=\"com_cbox_b com_cbox_rt\"></div><div class=\"com_cbox_b com_cbox_lb\"></div><div class=\"com_cbox_b com_cbox_rb\"></div><div class=\"clear\"></div></div>"),
					m_ResultTitleCn : "<span class=\"l_black\">{0}, 按照拼音排序 <a method=\"close\" class=\"ac_close\" href=\"#?\" title=\"关闭\"></a></span>",
					m_ResultTitleEn : "  <span class=\"l_black\">{0}, sort by spelling <a method=\"close\" class=\"ac_close\" href=\"#?\" title=\"close\"></a></span>",
					m_TitleCn : "<span>拼音支持首字母输入, 或<span style=\"font-family: simsun;\">&nbsp;←↑↓→&nbsp;</span>选择</span><a class=\"ac_close\" href=\"#?\" method=\"close\"  title=\"关闭\"></a>",
					m_TitleEn : "<span>Please enter or select from below</span><a class=\"ac_close\" href=\"#?\"   method=\"close\" title=\"close\"></a>",
					m_Error : new Template(
							"<div class=\"com_error\" style=\"width: 230px;position:relative;\"><div style=\"width:100%;\"><ul><li>#{Error}</li></ul></div><div class=\"clear\"></div><div class=\"com_cbox_b com_cbox_lt\"></div><div class=\"com_cbox_b com_cbox_rt\"></div><div class=\"com_cbox_b com_cbox_lb\"></div><div class=\"com_cbox_b com_cbox_rb\"></div><div class=\"clear\"></div></div>"),
					m_ErrorCn : "对不起，找不到<span class=\"ml5\">{0}</span>",
					m_ErrorEn : "No matches!",
					options : {
						eventElement : null,
						lang : "cn",
						cityType : "",
						hotType : "",
						onSelect : null,
						onClose : null,
						hotWidth : 340,
						hotHeight : 138,
						hotData : null,
						cityData : null,
						colLen : 4, // 一排的个数
						maxLen : 10, // 搜索最大显示个数
						enableSearch : true,
						isJsonp : 0,
						resultNextId : "",
						searchField : "",
						searchType : "",
						searchUrl : "http://hotel.elong.com/city/"
					},
					// 初始化
					initialize : function(options) {
						Object.extend(Object.extend(this, this.options), options);
						this.prepareData();
						if (this.lang == "en" && this.hotWidth < 425) {
							this.hotWidth = 425;
						}
						this.eventElement.attr("datacheck", "");
						this.eventElement.unbind("click");
						this.eventElement.unbind("keyup");
						this.eventElement.unbind("keydown");
						this.eventElement.bind("click", this.onInputClick.bindAsEventListener(this));
						this.eventElement.bind("keyup", this.onInputKeyUp.bindAsEventListener(this));
						this.eventElement.bind("keydown", this.onInputKeyDown.bindAsEventListener(this));
					},

					getSelect : function() {
						return this.selectCity;
					},

					prepareData : function() {
						if (!String.isNullOrEmpty(this.cityType)) {
							// 初始化
							if (this.eventElement != null) {
								var city = {
									"CityId" : this.eventElement.attr("CityId"),
									"CityThreeSign" : this.eventElement.attr("CityThreeSign"),
									"CityNameCn" : (this.lang.toLowerCase() == "cn") ? this.eventElement.val() : this.eventElement.attr("CityName"),
									"CityNameEn" : (this.lang.toLowerCase() == "en") ? this.eventElement.val() : this.eventElement.attr("CityName")
								};
								this.eventElement[0]["City"] = city;
							}

							var _checkHotData = false, _checkDataId = false;
							_checkHotData = !((typeof CityHot) == "undefined")
							if (_checkHotData) {
								var typeStr = !String.isNullOrEmpty(this.hotType) ? this.hotType : this.cityType;
								for (var i = 0; i < CityHot.length; i++) {
									if (CityHot[i].CityType == typeStr) {
										this.hotData = CityHot[i].TabList;
									}
								}
							}
						}
					},

					destroyDOM : function() {
						this.windowElement = null;
						this.contentEndRegion = null;
						this.options = null;
					},

					initializeEvent : function() {
						if (this.windowElement) {
							this.windowElement.bind("click", this.onClickRegion.bindAsEventListener(this));
							this.windowElement.bind("mouseout", this.onMouseOutRegion.bindAsEventListener(this));
							this.windowElement.bind("mouseover", this.onMouseOverRegion.bindAsEventListener(this));
							FunctionExt.defer(this.onOutClick.bindAsEventListener(this), 100);
						}
					},

					destroyEvent : function() {
						this.windowElement.unbind("click");
						this.windowElement.unbind("mouseout");
						this.windowElement.unbind("mouseover");
					},

					buildHotDataHtml : function(dataDiv, index) {
						if (this.ie6FilterIFrame != null) {
							Globals.closeIE6Fliter(this.ie6FilterIFrame);
						}
						if (this.hotData.length > 0) {
							var hotDataSb = new StringBuilder();
							for (var i = 0; i < this.hotData[index].CityList.length; i++) {
								var liclass = (i % 2 == 0) ? "ac_even" : "ac_odd";
								var m_CityData = this.lang.toLowerCase() == "cn"
										? decodeURIComponent(this.hotData[index].CityList[i].CityNameCn)
										: this.hotData[index].CityList[i].CityNameEn;
								hotDataSb.append("<li method=\"liHotData\" data=\"" + index + "|" + i + "\"  title=\"" + m_CityData + "\" class=\"" + liclass
										+ " " + (i == 0 ? "ac_over" : "") + "\">" + m_CityData + "</li>");
							}
							dataDiv.html(hotDataSb.toString());
							FunctionExt.defer(this.onOutClick.bindAsEventListener(this), 100);
						}
					},

					buildHtml : function(keyword) {
						var temp = encodeURIComponent(keyword.replace(/[\s,\']+/g, "").toLowerCase());
						var url = this.searchUrl;
						if (this.isJsonp == 0) {
							var appPath = "";
							var host = window.location.host;
							if (host.toLowerCase().indexOf("travel.elong") > -1 || host.toLowerCase().indexOf("elong") < 0) {
								var path = window.location.pathname;
								var pathtemp = path.split("/");
								if (pathtemp.length > 1)
									appPath = "/" + pathtemp[1];
							}
							url = appPath + "/city/" + this.cityType + "/" + this.maxLen + ".html";
						} else if (this.isJsonp == 99) {
							url = "http://h.elong.com/city/" + this.cityType + "/" + this.maxLen + ".html";
						} else {
							url += this.cityType + "/" + this.maxLen + ".html";
						}
						elongAjax.callBack(url, {
							keyword : temp
						}, function(data) {

							this.eventElement.attr("CityId", "");
							this.eventElement.attr("CityThreeSign", "");

							var m_Title = this.lang.toLowerCase() == "cn" ? String.format(this.m_ResultTitleCn, keyword) : String.format(this.m_ResultTitleEn,
									keyword);
							this.contentEndRegion = $("#m_contentend");
							this.contentEndRegion.html("");
							this.windowElement = $("<div  style=\"display:none; position: absolute; z-index: 2000;\"></div>").appendTo(this.contentEndRegion);
							this.cityData = data || [];
							this.selectCity = this.cityData[0];
							this.eventElement[0]["City"] = this.cityData[0];

							this.windowElement.html(this.m_Result.eval({
								ResultTitleHtml : m_Title,
								ResultDataHtml : ""
							}));

							if (this.ie6FilterIFrame != null) {
								Globals.closeIE6Fliter(this.ie6FilterIFrame);
							}
							var ulCity = this.windowElement.find("ul[method='cityData']");
							for (var i = 0; i < this.cityData.length; i++) {
								var m_CityData = this.lang.toLowerCase() == "cn"
										? decodeURIComponent(this.cityData[i].CityNameCn)
										: this.cityData[i].CityNameEn;
								var liclass = (i % 2 == 0) ? "ac_even" : "ac_odd";
								var tempHtml = "";
								if (String.isNullOrEmpty(this.searchField) && this.searchType != this.cityData[i].CityType) {
									tempHtml = "<li method=\"liData\" data=\"" + i + "\" title=\"" + m_CityData + "\" ><span method=\"spanData\">"
											+ this.cityData[i].CityNameEn + "</span>" + (this.lang.toLowerCase() == "cn" ? m_CityData : "") + "</li>";
								} else {
									if (this.searchType == this.cityData[i].CityType) {
										tempHtml = "<li method=\"liData\" data=\"" + i + "\" title=\"" + m_CityData + "\" ><span method=\"spanData\">"
												+ this.cityData[i][this.searchField].replace(/_/g, ',') + "</span>"
												+ (this.lang.toLowerCase() == "cn" ? m_CityData : "") + "</li>";
									} else {
										tempHtml = "<li method=\"liData\" data=\"" + i + "\" title=\"" + m_CityData + "\" ><span method=\"spanData\">"
												+ this.cityData[i].CityNameEn + "</span>" + (this.lang.toLowerCase() == "cn" ? m_CityData : "") + "</li>";
									}
								}
								$(tempHtml).appendTo(ulCity);
							}
							if (this.cityData.length > 0) {
								this.windowElement.find("ul[method='cityData'] li:first").addClass("ac_over");
							} else {
								var m_ErrorTitle = this.lang.toLowerCase() == "cn" ? String.format(this.m_ErrorCn, keyword) : String.format(this.m_ErrorEn,
										keyword);
								this.windowElement.html(this.m_Error.eval({
									Error : m_ErrorTitle
								}));
							}
							this.windowElement.attr("winstyle", "data");
							this.initializeEvent();
							this.render();
						}.bind(this), true, "GET", false, "jsonp");
					},

					buildHotHtml : function() {
						this.reloadData();
						// 与语言相关的参数的处理
						var m_Title = this.lang.toLowerCase() == "cn" ? this.m_TitleCn : this.m_TitleEn;
						if (this.windowElement) {
							this.windowElement.remove();
						}
						this.contentEndRegion = $("#m_contentend");
						this.windowElement = $("<div style=\"display:none; position: absolute; z-index: 2000;\"></div>").appendTo(this.contentEndRegion);
						var hotTabSb = new StringBuilder();
						var hotDataSb = new StringBuilder();
						var defaultTab = 0, defaultIndex = 0;
						if (!String.isNullOrEmpty(this.eventElement.attr("datacheck"))) {
							var pos = this.eventElement.attr("datacheck").split("|");
							if (pos.length == 2) {
								defaultTab = pos[0];
								defaultIndex = pos[1];
							} else {
								for (var i = 0; i < this.hotData.length; i++) {
									for (var j = 0; j < this.hotData[i].CityList.length; j++) {
										if (this.hotData[i].CityList[j].CityId == this.cityData[pos[0]].CityId) {
											defaultTab = i;
											defaultIndex = j;
											break;
										}
									}
								}
							}
						}
						if (this.hotData != null) {
							for (var i = 0; i < this.hotData.length; i++) {
								var m_hotTab = this.lang.toLowerCase() == "cn" ? decodeURIComponent(this.hotData[i].Name) : this.hotData[i].NameEn;
								hotTabSb.append("<li method=\"liHotTab\" index=\"" + i + "\" " + (i == defaultTab ? "class=\"action\"" : "") + ">" + m_hotTab
										+ "</li>");
							}

							for (var j = 0; j < this.hotData[defaultTab].CityList.length; j++) {
								var m_CityData = this.lang.toLowerCase() == "cn"
										? decodeURIComponent(this.hotData[defaultTab].CityList[j].CityNameCn)
										: this.hotData[defaultTab].CityList[j].CityNameEn;
								var liclass = (j % 2 == 0) ? "ac_even" : "ac_odd";
								hotDataSb.append("<li method=\"liHotData\" data=\"" + defaultTab + "|" + j + "\" title=\"" + m_CityData + "\" class=\""
										+ liclass + (j == defaultIndex ? " ac_over" : "") + "\">" + m_CityData + "</li>");
							}

							this.windowElement.html(this.m_Container.eval({
								Language : (this.lang.toLowerCase() == "cn") ? "" : "_en",
								HotTitle : m_Title,
								HotTab : hotTabSb.toString(),
								HotData : hotDataSb.toString(),
								HotWidth : this.hotWidth
							}));
						}
						this.windowElement.attr("winstyle", "hot");
					},

					reloadData : function() {
						if (this.windowElement) {
							this.windowElement.remove();
							if (this.ie6FilterIFrame != null) {
								Globals.closeIE6Fliter(this.ie6FilterIFrame);
							}
						}

						if (!String.isNullOrEmpty(this.cityType)) {
							var _checkHotData = false, _checkDataId = false;
							_checkHotData = !((typeof CityHot) == "undefined")
							if (_checkHotData) {

								var citytype = String.isNullOrEmpty(this.hotType) ? this.cityType : this.hotType;
								for (var i = 0; i < CityHot.length; i++) {
									if (CityHot[i].CityType == citytype) {
										this.hotData = CityHot[i].TabList;
									}
								}
							}
						}
					},
					onInputClick : function(evt) {
						if (!Object.isNull(this.hotData) && this.windowElement == null) {
							this.buildHotHtml();
							this.initializeEvent();
							this.render();
							this.eventElement.select();
						}
					},
					onInputKeyUp : function(evt) {
						if (!this.enableSearch)
							return;
						var element = Event.element(evt);
						if (this.windowElement && this.windowElement.attr("winstyle") == "data") {
							var ulData = this.windowElement.find("ul[method='cityData']");
							var select = this.windowElement.find("ul[method='cityData'] li[class*='ac_over']");
							switch (evt.keyCode) {
								case this.KeyCode.Up : {
									select.removeClass("ac_over");
									if (select.prev("li").length > 0)
										select.prev("li").addClass("ac_over");
									else
										this.windowElement.find("ul[method='cityData'] li:last").addClass("ac_over");
									ulData.scrollTop((select.offset().top - ulData.offset().top) < ulData.height() - 30
											&& (select.offset().top - ulData.offset().top) > 0
											? (select.offset().top - ulData.offset().top)
											: select.offset().top);
								}
									break;
								case this.KeyCode.Down : {
									select.removeClass("ac_over");
									if (select.next("li").length > 0)
										select.next("li").addClass("ac_over");
									else
										this.windowElement.find("ul[method='cityData'] li:first").addClass("ac_over");
									ulData.scrollTop((select.offset().top - ulData.offset().top) > ulData.height() - 30 ? 0 : (select.offset().top - ulData
											.offset().top));
								}
									break;
								case this.KeyCode.Return : {
									var select = this.windowElement.find("ul[method='cityData'] li[class*='ac_over']");
									this.selectData(select);
								}
									return;
								default :
									clearTimeout(this.timeout);
									this.timeout = setTimeout(function() {
										this.reBuildData(element);
									}.bind(this), this.delay);
							}
						} else {
							switch (evt.keyCode) {
								case this.KeyCode.Up :
								case this.KeyCode.Down :
								case this.KeyCode.Left :
								case this.KeyCode.Right :
								case this.KeyCode.Return : {
								}
									break;
								default : {
									clearTimeout(this.timeout);
									this.timeout = setTimeout(function() {
										this.reBuildData(element);
									}.bind(this), this.delay);
								}
							}
						}
						evt.stopPropagation();
					},

					reBuildData : function(evt) {
						var element = evt;
						if (!String.isNullOrEmpty(this.cityType)) {
							if (String.isNullOrEmpty(element.val())) {
								this.buildHotHtml();
								this.initializeEvent();
								this.render();
							} else {
								this.buildHtml(element.val());
							}
						}
					},
					onInputKeyDown : function(evt) {
						if (this.windowElement && this.windowElement.attr("winstyle") == "hot") {
							var select = this.windowElement.find("ul[method='hotData'] li[class*='ac_over']");
							var step = this.colLen - 1;
							switch (evt.keyCode) {
								case this.KeyCode.Right : {
									select.removeClass("ac_over");
									if (select.next("li").length > 0)
										select.next("li").addClass("ac_over");
									else
										this.windowElement.find("ul[method='hotData'] li:first").addClass("ac_over");
								}
									break;
								case this.KeyCode.Left : {
									select.removeClass("ac_over");
									if (select.prev("li").length > 0)
										select.prev("li").addClass("ac_over");
									else
										this.windowElement.find("ul[method='hotData'] li:last").addClass("ac_over");
								}
									break;
								case this.KeyCode.Down : {
									var nextSelect = select.nextAll(":eq(" + step + ")");
									if (nextSelect.length == 0) {
										var last = select.prevAll("li").length % this.colLen;
										nextSelect = this.windowElement.find("ul[method='hotData'] li:eq(" + last + ")");
									}
									nextSelect.addClass("ac_over");
									select.removeClass("ac_over");
								}
									break;
								case this.KeyCode.Up : {
									var prevSelect = select.prevAll(":eq(" + step + ")");
									if (prevSelect.length == 0) {
										var last = select.prevAll("li").length
												+ Math.floor(this.windowElement.find("ul[method='hotData'] li").length / this.colLen) * this.colLen;
										prevSelect = this.windowElement.find("ul[method='hotData'] li:eq(" + last + ")");
									}
									prevSelect.addClass("ac_over");
									select.removeClass("ac_over");
								}
									break;
								case this.KeyCode.Return : {
									var select = this.windowElement.find("ul[method='hotData'] li[class*='ac_over']");
									this.selectData(select);
								}
									return;
								default :
									break;
							}
							this.eventElement.focus();
						}
						evt.stopPropagation();
					},

					onOutClick : function() {
						$(document).one(
								"click",
								function(evt) {
									var element = Event.element(evt);
									if (this.windowElement != null && this.windowElement.find("*").index(element) == -1 && this.eventElement[0] != element[0]
											&& (element.attr("method") != "liHotTab")) {
										this.dispose();
									}
								}.bindAsEventListener(this));
					},

					selectData : function(elem) {
						if (!String.isNullOrEmpty(elem.attr("data"))) {
							var selectCityData;
							if (this.windowElement.attr("winstyle") == "hot") {
								var pos = elem.attr("data").split("|");
								var m_CityData = this.lang.toLowerCase() == "cn"
										? decodeURIComponent(this.hotData[pos[0]].CityList[pos[1]].CityNameCn)
										: this.hotData[pos[0]].CityList[pos[1]].CityNameEn;
								this.eventElement.val(m_CityData);
								this.eventElement.attr("datacheck", elem.attr("data"));
								selectCityData = this.hotData[pos[0]].CityList[pos[1]];
							} else {
								var pos = elem.attr("data");
								var m_CityData = this.lang.toLowerCase() == "cn"
										? decodeURIComponent(this.cityData[pos].CityNameCn)
										: this.cityData[pos].CityNameEn;
								this.eventElement.val(m_CityData);
								this.eventElement.attr("datacheck", pos);
								selectCityData = this.cityData[pos];
							}

							this.selectCity = selectCityData;
							this.eventElement[0]["City"] = selectCityData;
							this.eventElement.attr("CityId", selectCityData.CityId);
							this.eventElement.attr("CityThreeSign", selectCityData.CityThreeSign);

							if (this.onSelect) {
								this.onSelect(this.eventElement, selectCityData);
							}
							if (!String.isNullOrEmpty(this.resultNextId)) {
								$("#" + this.resultNextId).focus();
							}
							this.dispose();
						}
					},

					HotCityLoad : function(dataDiv, index) {
						if (this.hotData.length > 0) {
							var isAjax = false;
							if (this.hotData[index].CityList.length == 0) {
								isAjax = true;

							} else {
								this.buildHotDataHtml(dataDiv, index);
								this.render();
							}
							if (isAjax) {
								var tabId = this.hotData[index].TabId;
								var typeStr = !String.isNullOrEmpty(this.hotType) ? this.hotType : this.cityType;
								var url = "http://hotel.elong.com/hotcity/";
								if (this.isJsonp == 0) {
									var appPath = "";
									var host = window.location.host;
									if (host.toLowerCase().indexOf("travel.elong") > -1 || host.toLowerCase().indexOf("elong") < 0) {
										var path = window.location.pathname;
										var pathtemp = path.split("/");
										if (pathtemp.length > 1)
											appPath = "/" + pathtemp[1];
									}
									url = appPath + "/hotcity/" + typeStr + "/" + tabId + ".html";
								} else if (this.isJsonp == 99) {
									url = "http://f.elong.com/hotcity/" + typeStr + "/" + tabId + ".html";
								} else {
									url += typeStr + "/" + tabId + ".html";
								}

								// divData.append("<li><p
								// class=\"p20\">获取数据中，请稍后...... </p></li>");
								elongAjax.callBack(url, {}, function(data) {
									this.hotData[index] = data;
									this.buildHotDataHtml(dataDiv, index);
									this.render();
								}.bind(this), true, "GET", false, "jsonp");

							}

						}

					},

					onClickRegion : function(evt) {
						var elem = Event.element(evt);
						var method = elem.attr("method");
						switch (method) {
							case "liHotTab" :
								this.windowElement.find("ul[method='hotTab'] li").removeClass("action");
								elem.addClass("action");
								// this.buildHotDataHtml(this.windowElement.find("ul[method='hotData']"),
								// elem.attr("index"));
								// this.render();

								this.HotCityLoad(this.windowElement.find("ul[method='hotData']"), elem.attr("index"));
								this.eventElement.focus();
								return;
							case "liHotData" :
								this.selectData(elem);
								return;
							case "liData" :
							case "spanData" :
								this.selectData((method == "liData") ? elem : elem.parent());
								return;
							case "close" :
								this.dispose();
								return;
							default :
								this.dispose();
								return;
						}
					},

					onMouseOverRegion : function(evt) {
						var element = Event.element(evt);
						if (this.outTimer != null) {
							clearTimeout(this.outTimer);
							this.outTimer = null;
						}
						if (element.is("li") || element.parent().is("li")) {
							var focus = element.is("li") ? element : element.parent();
							focus.addClass("ac_over");
							// focus.siblings("li[class*=ac_over]").removeClass("ac_over");
						}
					},

					onMouseOutRegion : function(evt) {
						var element = Event.element(evt);
						var method = element.attr("method");
						if (element.is("li") || element.parent().is("li")) {
							var focus = element.is("li") ? element : element.parent();
							focus.removeClass("ac_over");
						}
					},

					render : function() {
						// 设置大小位置
						if (this.windowElement) {
							var top = this.eventElement.offset().top + this.eventElement.height() + 6;
							var left = this.eventElement.offset().left;

							var scroll = Globals.getScrollPosition();
							var browserRegion = Globals.browserDimensions();
							if (browserRegion.width - (this.eventElement.offset().left - scroll.x) > this.windowElement.width()) {
								this.windowElement[0].style.top = top + "px";
								this.windowElement[0].style.left = left + "px";
							} else {
								this.windowElement[0].style.top = top + "px";
								left = left - this.windowElement.width() + this.eventElement.width();
								this.windowElement[0].style.left = left + "px";
							}
							this.ie6FilterIFrame = Globals.addIE6Filter(this.windowElement.width(), this.windowElement.height(), left, top, 1999);
							this.windowElement.show();
						}
					},
					dispose : function() {
						if (this.windowElement) {
							// this.windowElement.fadeOut("normal");
							this.windowElement.hide();
							FunctionExt.defer(function() {
								if (this.windowElement) {
									Globals.closeIE6Fliter(this.ie6FilterIFrame);

									if (this.windowElement.attr("winstyle") == "data") {
										if (this.onClose != null) {
											this.onClose(this.eventElement, this.windowElement);
										}
									}
									this.windowElement.remove();
									this.destroyEvent();
									this.destroyDOM();

								}
							}.bind(this), 500);
						}
					}
				});

var CityWindow = Elong.Control.CityWindow;
CityWindow = Class.create();
Object.extend(CityWindow.prototype, {
	name : "CityWindow",
	city : null,
	options : {
		eventElement : null,
		lang : "cn",
		resultNextId : "",
		cityType : "",
		hotType : "",
		onSelect : null,
		onClose : null,
		hotWidth : 340,
		hotHeight : 138,
		delay : 50,
		maxLen : 10, // 搜索最大显示个数
		enableSearch : true,
		isJsonp : 0,
		searchField : "",
		searchType : "",
		searchUrl : "http://hotel.elong.com/city/"
	},
	// 初始化
	initialize : function(options) {
		Object.extend(Object.extend(this, this.options), options);
		this.city = new CityPad(options);
	},
	getSelect : function() {
		return this.city.getSelect();
	}
});
;// ===================================================================
// 文件名: CalendarWindow.js
// 版权: Copyright (C) 2009 Elong
// 创建人: zhi.Luo
// 创建日期: 2009-10-16
// 描述: 双栏日历弹出对话框，日期是否可选状态支持任意设置（通过isDisabledDay:function()）
// 备注:
// 示例代码：
// new CalendarWindow({
// eventElement: $(input),
// selectedDate: $(input).value,
// language: "en",
// enabledFrom: "2009-1-1",
// enabledTo: "2009-1-5",
// onSelected: function(date) {
// alert(date);
// } .bind(this)
// });
// new CalendarWindow({
// eventElement: $(input),
// selectedDate: $(input).value,
// isDisabledDay: function(year, month, day) {
// if (day == 5) return true; //每月5日不可选状态
// }.bind(this),
// onSelected: function(date) {
// alert(date);
// } .bind(this)
// });
// ===================================================================

// 日期操作公共类
var CalendarHelper = Elong.Control.CanlendarHelper;
CalendarHelper = Class.create();
Object.extend(CalendarHelper.prototype, {
	// 节假日时间
	FestivalDate : {
		yd : "2012-01-01",
		cx : "2012-01-22",
		cj : "2012-01-23",
		yx : "2012-02-06",
		qm : "2012-04-04",
		wy : "2012-05-01",
		dw : "2012-06-23",
		zq : "2011-09-12",
		gq : "2011-10-01"
	},
	TodayClassName : {
		jt : "jt",
		mt : "mt",
		ht : "ht"
	},
	WeekClassName : new Array("Sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "Saturday"),

	initialize : function(options) {
	},
	// 每个月的日期数
	getDayCount : function(year, month) {
		var dayCount = 0;
		var days = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
		if (month == 0) {
			dayCount = 31;
		} else if (month == 2) {
			if ((year % 400 == 0) || (year % 4 == 0 && year % 100 > 0)) {
				dayCount = 29; // 闰年
			} else {
				dayCount = 28;
			}
		} else {
			dayCount = days[month - 1];
		}
		return dayCount;
	},

	validateDateRange : function(value, minDate, maxDate) {
		if (Object.isNull(minDate)) {
			minDate = "0001-01-01";
		}
		if (Object.isNull(maxDate)) {
			maxDate = "9999-12-31";
		}

		return this.reFormatDateString(value) >= this.reFormatDateString(minDate) && this.reFormatDateString(value) <= this.reFormatDateString(maxDate);
	},

	/* 把日期字符串格式化成 yyyy-mm-dd格式 ，便于比较大小 */
	reFormatDateString : function(dateStr, isCn) {
		var dateArray = new Array(3);
		var year, month, day;

		if (String.isNullOrEmpty(dateStr))
			return '';

		if (dateStr.indexOf("-") > -1) {
			dateArray = dateStr.split("-");
			if (dateArray.length != 3) {
				return "";
			}
			year = dateArray[0];
			month = dateArray[1];
			day = dateArray[2];
		} else {
			dateArray = dateStr.split("/");
			if (dateArray.length != 3) {
				return "";
			}
			year = dateArray[2];
			month = dateArray[0];
			day = dateArray[1];
		}

		if (year.length <= 2)
			year = '19' + year;
		if (month.length == 1)
			month = '0' + month;
		if (day.length == 1)
			day = '0' + day;
		return Object.isNull(isCn) || isCn ? year + '-' + month + '-' + day : month + '/' + day + "/" + year;
	},
	// 获得当前日期，用于比较
	getTodayString : function() {
		var d = new Date();
		return this.getDateString(d);
	},

	// 获取日期字符串2009-01-12
	getDateString : function(dateObj) {
		var month = dateObj.getMonth() + 1;
		var day = dateObj.getDate();
		var monthStr = month > 9 ? month.toString() : '0' + month.toString();
		var dayStr = day > 9 ? day.toString() : '0' + day.toString();
		var result = dateObj.getFullYear().toString() + '-' + monthStr + '-' + dayStr;
		return result;
	},
	/* 验证为正确的日期格式 */
	validateDate : function(value) {
		var iaMonthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
		var iaDate = new Array(3)
		var year, month, day

		var result = true;
		var strValue = value;
		if (strValue.length != 0) {
			iaDate = strValue.split("-")
			if (iaDate.length != 3 || iaDate[1].length > 2 || iaDate[2].length > 2 || iaDate[1].length < 1 || iaDate[2].length < 1) {
				result = false;
			}

			year = parseInt(iaDate[0], 10);
			month = parseInt(iaDate[1], 10);
			day = parseInt(iaDate[2], 10);

			if (isNaN(year) || isNaN(month) || isNaN(day)) {
				result = false;
			}

			if (year < 1900 || year > 2100) {
				result = false;
			}

			if (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0))
				iaMonthDays[1] = 29;
			if (month < 1 || month > 12 || day < 1 || day > iaMonthDays[month - 1]) {
				result = false;
			}
		}
		return result;
	},

	// 根据当前日期获取ClassName
	getFestivalClassName : function(currday) {
		var className = "";
		for ( var key in this.FestivalDate) {
			if (currday == this.FestivalDate[key]) {
				className = key;
			}
		}
		return className;
	},

	// 增加节假日、今明后、星期的样式
	addElementClass : function(element, currday) {
		// 获取目前日期的节假日、今明后、星期样式
		var className = "";
		for ( var key in this.FestivalDate) {
			if (this.FestivalDate[key] == currday) {
				className = key;
			}
		}
		if (className == "") {
			var date = new Date();
			var date1 = new Date();
			var date2 = new Date();
			date1.setFullYear(date.getFullYear(), date.getMonth(), date.getDate() + 1);
			date2.setFullYear(date.getFullYear(), date.getMonth(), date.getDate() + 1);
			switch (currday) {
				case this.getDateString(date) :
					className = this.TodayClassName.jt;
					break;
				case this.getDateString(date1) :
					className = this.TodayClassName.mt;
					break;
				case this.getDateString(date2) :
					className = this.TodayClassName.ht;
					break;
			}
		}
		if (className == "") {
			var day = validator.convertDate(currday).getDay();
			className = this.WeekClassName[day];
		}

		// 判断原来样式中是否有节假日、今明后、星期的样式
		var oldName = "";
		var oldClass = element.attr("class");
		for ( var key in this.FestivalDate) {
			if (oldClass.indexOf(key) > -1) {
				oldName = key;
			}
		}
		for ( var key in this.TodayClassName) {
			if (oldClass.indexOf(key) > -1) {
				oldName = key;
			}
		}
		for (var i = 0; i < this.WeekClassName.length; i++) {
			if (oldClass.indexOf(this.WeekClassName[i]) > -1) {
				oldName = this.WeekClassName[i];
			}
		}
		if (oldName != "") {
			oldClass = oldClass.replace(oldName, "");
		}
		element.attr("class", oldClass + " " + className);
	}
});

// 单屏日历框
var SingleCalendar = Elong.Control.SingleCalendar;
SingleCalendar = Class.create();
Object
		.extend(
				SingleCalendar.prototype,
				{

					popRegion : new Template(
							"<div class=\"com_cbox com_select_YM\"><div class=\"calendar_year\" align=\"center\"><div class=\"year\"><a class=\"mf_lr_t cu_n\" href=\"#?\"  method=\"btnPre\" title=\"上一月\">&nbsp;</a></div>#{MonthSPAN}<div class=\"month_1\"><a class=\"mf_rr_a\" href=\"#?\" method=\"btnNext\" title=\"下一月\">&nbsp;</a></div></div><div class=\"date_box\">#{MonthHTML}</div><div class=\"clear\"></div><div class=\"com_cbox_b com_cbox_lt\"></div><div class=\"com_cbox_b com_cbox_rt\"></div><div class=\"com_cbox_b com_cbox_lb\"></div><div class=\"com_cbox_b com_cbox_rb\"></div><div class=\"clear\"></div></div>"),
					weakHTML_cn : "<tr class=\"family\"><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th class=\"or\">六</th><th class=\"or\">日</th></tr>",
					weakHTML_en : "<tr class=\"family\"><th class=\"or\">S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th class=\"or\">S</th></tr>",
					monthSPAN_cn : "<span><select method=\"selMonth\"><option value=\"1\">一月</option><option value=\"2\">二月</option><option value=\"3\">三月</option><option value=\"4\">四月</option><option value=\"5\">五月</option><option value=\"6\">六月</option><option value=\"7\">七月</option><option value=\"8\">八月</option><option value=\"9\">九月</option><option value=\"10\">十月</option><option value=\"11\">十一月</option><option value=\"12\">十二月</option></select></span><span><select method=\"selYear\"></select></span>",
					monthSPAN_en : "<span><select method=\"selMonth\"><option value=\"1\">Jan</option><option value=\"2\">Feb</option><option value=\"3\">Mar</option><option value=\"4\">Apr</option><option value=\"5\">May</option><option value=\"6\">Jun</option><option value=\"7\">Jul</option><option value=\"8\">Aug</option><option value=\"9\">Sep</option><option value=\"10\">Oct</option><option value=\"11\">Nov</option><option value=\"12\">Dec</option></select></span><span><select method=\"selYear\"></select></span>",
					options : {
						eventElement : null, // 触发事件object
						selectedDate : null, // 显示已选中的日期"2009-01-01"，默认为今日
						language : "cn", // 中文: cn, en
						enabledFrom : null, // 设置可选日期开始时间："2009-01-01",默认为今日
						enabledTo : null, // 设置可选日期结束时间: "9999-12-12", 默认不限制
						onSelected : null, // 用户选择后回调函数: onSelected(date),
											// date为yyyy/mm/dd或者mm/dd/yyyy
						winStyle : "s", // d:双日历 s: 单日历
						windowElement : null,
						startMonth : 1,
						startYear : 1990,
						yearOrder : "a"
					},

					initialize : function(options) {
						Object.extend(Object.extend(this, this.options), options);
						this.weakHTML = this.language.toLowerCase() == "cn" ? this.weakHTML_cn : this.weakHTML_en;
						this.helper = new CalendarHelper();
					},

					refreshMonth : function(year, month) {
						var spanHTML = this.language.toLowerCase() == "cn" ? this.monthSPAN_cn : this.monthSPAN_en;
						var contentHTML = this.popRegion.eval({
							MonthSPAN : spanHTML,
							MonthHTML : this.getDateHTML(year, month)
						});

						this.windowElement.html(contentHTML);
						var selMonth = this.windowElement.find("select[method='selMonth']");
						var selYear = this.windowElement.find("select[method='selYear']");

						if (selMonth != null) {
							selMonth.val(month);
							selMonth.bind("change", this.onSelectChange.bindAsEventListener(this));
						}
						if (selYear != null) {

							var selBeginYear = this.startYear - 100;
							var selEndYear = parseInt(this.startYear) + 10;
							if (!Object.isNull(this.enabledFrom) && !String.isNullOrEmpty(this.enabledFrom)) {
								var enableFromDay = this.helper.reFormatDateString(this.enabledFrom, true);
								selBeginYear = parseInt(enableFromDay.substring(0, 4));
							}
							if (!Object.isNull(this.enabledTo) && !String.isNullOrEmpty(this.enabledTo)) {
								var enableToDay = this.helper.reFormatDateString(this.enabledTo, true);
								selEndYear = parseInt(enableToDay.substring(0, 4));
							}
							switch (this.yearOrder.toLowerCase()) {
								case "a" : {
									for (var i = selBeginYear; i <= selEndYear; i++)
										selYear.append("<option value=\"" + i + "\">" + i + "</option>")
								}
									break;
								case "d" : {
									for (var i = selEndYear; i >= selBeginYear; i--)
										selYear.append("<option value=\"" + i + "\">" + i + "</option>")
								}
									break;
							}
							selYear.val(year);
							selYear.bind("change", this.onSelectChange.bindAsEventListener(this));
						}
					},
					onSelectChange : function(evt) {
						var selMonth = this.windowElement.find("select[method='selMonth']");
						var selYear = this.windowElement.find("select[method='selYear']");
						this.refreshMonth(selYear.val(), selMonth.val());
					},

					// 获取日期列表
					getDateHTML : function(year, month) {
						var li = "<td onmouseover=\"$(this).toggleClass('hover')\" onmouseout=\"$(this).toggleClass('hover')\" class=\"{1}\">{0}</td>";
						var disableLi = "<td class=\"Close\">{0}</td>";
						var grayLi = "<td onmouseover=\"$(this).toggleClass('hover')\" onmouseout=\"$(this).toggleClass('hover')\" class=\"{1}\">{0}</td>";
						var dateSb = new StringBuilder();
						dateSb.append(String.format("<table date=\"{0}-{1}-\" width=\"140\" height=\"115\" cellspacing=\"0\" cellpadding=\"0\">", year, month));
						dateSb.append(this.weakHTML);
						var dayCount = this.helper.getDayCount(year, month);
						var firstDate = new Date(year, month - 1, 1);
						var beginDay = firstDate.getDay(); // 1号是星期几：0-6
						var liStyle = "";
						var lineCount = 1;
						var count1 = dayCount + beginDay;
						if (this.language.toLowerCase() == "cn" && beginDay == 0) {
							count1 = count1 + 7;
						}
						var j = 1;
						for (var i = 0; i < count1; i++) {
							if (this.language.toLowerCase() == "cn") {
								if (i % 7 == 1) {
									dateSb.append("<tr>")
								};
							} else {
								if (i % 7 == 0) {
									dateSb.append("<tr>")
								};
							}
							if (this.isDisabledDay(year, month, j)) {
								liStyle = disableLi; // 不可选
							} else if ((this.language.toLowerCase() == "cn" && (i % 7 == 1 || (i + 1) % 7 == 1))
									|| (this.language.toLowerCase() == "en" && (i % 7 == 0 || (i + 1) % 7 == 0))) {
								liStyle = grayLi;
							} else {
								liStyle = li;
							}

							var className = "";
							var isFestival = false;
							var currday = this.helper.reFormatDateString(year + "-" + month + "-" + j);
							if (i % 7 == 6 || i % 7 == 0) {
								className = "bold or";
							}
							if (currday == this.helper.reFormatDateString(this.selectedDate, true)) {
								className = "selected";
							}
							if (currday == this.helper.getTodayString()) {
								className = "newdate";
							}
							if (this.language.toLowerCase() == "cn") {
								var festivalClass = this.helper.getFestivalClassName(currday);
								if (festivalClass != "") {
									className = festivalClass;
									if (currday == this.selectedDate) {
										className = className + "t";
									}
									isFestival = true;
								}
							}

							if (i < beginDay || (this.language.toLowerCase() == "cn" && beginDay == 0 && i < 7)) {
								dateSb.append(String.format(liStyle, "", ""));
							} else {
								if (this.language.toLowerCase() == "cn" && isFestival && !this.isDisabledDay(year, month, j)) {
									dateSb.append(String.format(liStyle, "&nbsp;", className));
								} else {
									dateSb.append(String.format(liStyle, j, className));
								}
								j++;
							}
							if (this.language.toLowerCase() == "cn") {
								if (i % 7 == 0) {
									dateSb.append("</tr>");
								}
							} else {
								if (i % 7 == 6) {
									dateSb.append("</tr>");
								}
							}
						}
						var lastDate = new Date(year, month - 1, dayCount);
						var endDay = lastDate.getDay(); // 最后一天是星期几
						var count2 = 6 - endDay;
						for (var i = 0; i < count2; i++) {
							if ((i + 1) % 7 != 0) {
								dateSb.append(String.format(li, "", ""));
							} else {
								dateSb.append(String.format(grayLi, "", ""));
							}
						}
						dateSb.append("</tr></table>");
						return dateSb.toString();
					},

					isDisabledDay : function(year, month, day) {
						if (Object.isNull(this.enabledFrom)) {
							this.enabledFrom = this.helper.getTodayString();
						}
						var curr = year + "-" + month + "-" + day;
						return !this.helper.validateDateRange(curr, this.enabledFrom, this.enabledTo);
					},
					onClickRegion : function(method) {
						var selYear = this.windowElement.find("select[method='selYear']").val();
						switch (method) {
							case "btnPre" : {
								if (this.startMonth == 1) {
									selYear--;
								}
								if (this.startMonth == 1) {
									this.startMonth += 12;
								}
								this.startMonth -= 1;
								this.refreshMonth(selYear, this.startMonth);
							}
								break;
							case "btnNext" : {
								if (this.startMonth == 12) {
									selYear++;
								}
								if (this.startMonth == 12) {
									this.startMonth -= 12;
								}
								this.startMonth += 1;
								this.refreshMonth(selYear, this.startMonth);
							}
								break;
						}
					}
				});

// 双屏输入框
var DoubleCalendar = Elong.Control.DoubleCalendar;
DoubleCalendar = Class.create();
Object
		.extend(
				DoubleCalendar.prototype,
				{

					popRegion : new Template(
							"<div class=\"com_cbox\" >  <div class=\"calendar_year\"><div class=\"year\"><a method=\"btnPre\" href=\"#?\" title=\"上一月\" class=\"mf_lr_t cu_n\">&nbsp;</a></div>#{MonthSPAN}	<div class=\"month_1\"><a  method=\"btnNext\" title=\"下一月\" href=\"#?\" class=\"mf_rr_a cu_n\">&nbsp;</a></div></div>  <div class=\"date_box\">	#{MonthHTML}	<div class=\"hr\"></div>	#{nextMonthHTML}  </div>  <div class=\"clear\"></div>  <div class=\"com_cbox_b com_cbox_lt\"></div>  <div class=\"com_cbox_b com_cbox_rt\"></div>  <div class=\"com_cbox_b com_cbox_lb\"></div>  <div class=\"com_cbox_b com_cbox_rb\"></div><div class=\"clear\"></div></div>"),
					weakHTML_cn : "<tr class=\"family\"><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th class=\"or\">六</th><th class=\"or\">日</th></tr>",
					weakHTML_en : "<tr class=\"family\"><th class=\"or\">S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th class=\"or\">S</th></tr>",
					monthSPAN_cn : "<span class=\"h\">{0}年{1}月</span><span class=\"m\">{2}年{3}月</span>",
					monthSPAN_en : "<span class=\"h\">{0}.{1}</span><span class=\"m\">{2}.{3}</span>",
					options : {
						eventElement : null, // 触发事件object
						selectedDate : null, // 显示已选中的日期"2009-01-01"，默认为今日
						language : "cn", // 中文: cn, en
						enabledFrom : null, // 设置可选日期开始时间："2009-01-01",默认为今日
						enabledTo : null, // 设置可选日期结束时间: "9999-12-12", 默认不限制
						onSelected : null, // 用户选择后回调函数: onSelected(date),
											// date为yyyy/mm/dd或者mm/dd/yyyy
						winStyle : "d", // d:双日历 s: 单日历
						windowElement : null,
						startMonth : 1,
						startYear : 1990,
						yearOrder : "a"
					},

					initialize : function(options) {
						Object.extend(Object.extend(this, this.options), options);
						this.weakHTML = this.language.toLowerCase() == "cn" ? this.weakHTML_cn : this.weakHTML_en;
						this.helper = new CalendarHelper();

					},

					refreshMonth : function(year, month) {
						var nextYear = month == 12 ? year + 1 : year;
						var nextMonth = month == 12 ? 1 : month + 1;
						var spanHTML = this.language.toLowerCase() == "cn" ? this.monthSPAN_cn : this.monthSPAN_en;
						spanHTML = String.format(spanHTML, year, month, nextYear, nextMonth);
						var contentHTML = this.popRegion.eval({
							MonthSPAN : spanHTML,
							MonthHTML : this.getDateHTML(year, month),
							nextMonthHTML : this.getDateHTML(nextYear, nextMonth)
						});
						this.windowElement.html(contentHTML);
					},
					// 获取日期列表
					getDateHTML : function(year, month) {
						var li = "<td onmouseover=\"$(this).toggleClass('hover')\" onmouseout=\"$(this).toggleClass('hover')\" class=\"{1}\">{0}</td>";
						var disableLi = "<td class=\"Close\">{0}</td>";
						var grayLi = "<td onmouseover=\"$(this).toggleClass('hover')\" onmouseout=\"$(this).toggleClass('hover')\" class=\"{1}\">{0}</td>";
						var dateSb = new StringBuilder();
						dateSb.append(String.format("<table date=\"{0}-{1}-\" width=\"180\" height=\"115\" cellspacing=\"0\" cellpadding=\"0\">", year, month));
						dateSb.append(this.weakHTML);
						var dayCount = this.helper.getDayCount(year, month);
						var firstDate = new Date(year, month - 1, 1);
						var beginDay = firstDate.getDay(); // 1号是星期几：0-6
						var liStyle = "";
						var lineCount = 1;
						var count1 = dayCount + beginDay;
						if (this.language.toLowerCase() == "cn" && beginDay == 0) {
							count1 = count1 + 7;
						}
						var j = 1;
						for (var i = 0; i < count1; i++) {
							if (this.language.toLowerCase() == "cn") {
								if (i % 7 == 1) {
									dateSb.append("<tr>")
								};
							} else {
								if (i % 7 == 0) {
									dateSb.append("<tr>")
								};
							}
							if (this.isDisabledDay(year, month, j)) {
								liStyle = disableLi; // 不可选
							} else if ((this.language.toLowerCase() == "cn" && (i % 7 == 1 || (i + 1) % 7 == 1))
									|| (this.language.toLowerCase() == "en" && (i % 7 == 0 || (i + 1) % 7 == 0))) {
								liStyle = grayLi;
							} else {
								liStyle = li;
							}

							var className = "";
							var isFestival = false;
							var currday = this.helper.reFormatDateString(year + "-" + month + "-" + j);
							if (i % 7 == 6 || i % 7 == 0) {
								className = "bold or";
							}
							if (currday == this.helper.reFormatDateString(this.selectedDate, true)) {
								className = "selected";
							}
							if (currday == this.helper.getTodayString()) {
								className = "newdate";
							}
							if (this.language.toLowerCase() == "cn") {
								var festivalClass = this.helper.getFestivalClassName(currday);
								if (festivalClass != "") {
									className = festivalClass;
									if (currday == this.selectedDate) {
										className = className + "t";
									}
									isFestival = true;
								}
							}

							if (i < beginDay || (this.language.toLowerCase() == "cn" && beginDay == 0 && i < 7)) {
								dateSb.append(String.format(liStyle, "", ""));
							} else {
								if (this.language.toLowerCase() == "cn" && isFestival && !this.isDisabledDay(year, month, j)) {
									dateSb.append(String.format(liStyle, "&nbsp;", className));
								} else {
									dateSb.append(String.format(liStyle, j, className));
								}
								j++;
							}
							if (this.language.toLowerCase() == "cn") {
								if (i % 7 == 0) {
									dateSb.append("</tr>");
								}
							} else {
								if (i % 7 == 6) {
									dateSb.append("</tr>");
								}
							}
						}
						var lastDate = new Date(year, month - 1, dayCount);
						var endDay = lastDate.getDay(); // 最后一天是星期几
						var count2 = 6 - endDay;
						for (var i = 0; i < count2; i++) {
							if ((i + 1) % 7 != 0) {
								dateSb.append(String.format(li, "", ""));
							} else {
								dateSb.append(String.format(grayLi, "", ""));
							}
						}
						dateSb.append("</tr></table>");
						return dateSb.toString();
					},

					isDisabledDay : function(year, month, day) {
						if (Object.isNull(this.enabledFrom)) {
							this.enabledFrom = this.helper.getTodayString();
						}

						var curr = year + "-" + month + "-" + day;
						return !this.helper.validateDateRange(curr, this.enabledFrom, this.enabledTo);
					},
					onClickRegion : function(method) {
						switch (method) {
							case "btnPre" :
								if (this.startMonth < 3) {
									this.startYear--;
								}
								if (this.startMonth < 3) {
									this.startMonth += 12;
								}
								this.startMonth -= 2;
								this.refreshMonth(this.startYear, this.startMonth);
								return;
							case "btnNext" :
								if (this.startMonth > 10) {
									this.startYear++;
								}
								if (this.startMonth > 10) {
									this.startMonth -= 12;
								}
								this.startMonth += 2;
								this.refreshMonth(this.startYear, this.startMonth);
								return;
						}
					}
				});

// 日历操作公共类
var Calendar = Elong.Control.Calendar;
Calendar = Class.create();
Object.extend(Calendar.prototype, {
	options : {
		eventElement : null, // 触发事件object
		selectedDate : null, // 显示已选中的日期"2009-01-01"，默认为今日
		language : "cn", // 中文: cn, en
		enabledFrom : null, // 设置可选日期开始时间："2009-01-01",默认为今日
		enabledTo : null, // 设置可选日期结束时间: "9999-12-12", 默认不限制
		onSelected : null, // 用户选择后回调函数: onSelected(date),
							// date为yyyy/mm/dd或者mm/dd/yyyy
		winStyle : "d", // d:双日历 s: 单日历
		windowElement : null,
		yearOrder : "a"
	},
	initialize : function(options) {
		Object.extend(Object.extend(this, this.options), options);
		switch (this.winStyle.toLowerCase()) {
			case "d" : {
				this.prototype = new DoubleCalendar(options);
			}
				break;
			case "s" : {
				this.prototype = new SingleCalendar(options);
			}
				break;
			default :
				this.prototype = new DoubleCalendar(options);
		}
	}
});

var CalendarWindow = Elong.Control.CalendarWindow;
CalendarWindow = Class.create();
Object.extend(CalendarWindow.prototype,
		{
			name : "CalendarWindow",
			options : {
				eventElement : null, // 触发事件object
				selectedDate : null, // 显示已选中的日期"2009-01-01"，默认为今日
				language : "cn", // 中文: cn, en
				enabledFrom : null, // 设置可选日期开始时间："2009-01-01",默认为今日
				enabledTo : null, // 设置可选日期结束时间: "9999-12-12", 默认不限制
				onSelected : null, // 用户选择后回调函数: onSelected(date),
									// date为yyyy/mm/dd或者mm/dd/yyyy
				winStyle : "d",
				yearOrder : "a"
			// isDisabledDay判断是否是可选的日期派生方法:function(year, month, day)
			},

			// 初始化
			initialize : function(options) {
				Object.extend(Object.extend(this, this.options), options);
				this.helper = new CalendarHelper();
				this.initializeDOM();
				this.initializeEvent();

				var d = new Date();
				// 格式化初始参数
				if (Object.isNull(this.selectedDate) || String.isNullOrEmpty(this.selectedDate)
						|| !this.helper.validateDate(this.helper.reFormatDateString(this.selectedDate, true))) {
					this.selectedDate = this.helper.getTodayString();
				} else {
					this.selectedDate = this.helper.reFormatDateString(this.selectedDate);
				}
				this.startYear = parseInt(this.selectedDate.split("-")[0], 10) || d.getFullYear();
				this.startMonth = parseInt(this.selectedDate.split("-")[1], 10) || d.getMonth() + 1;
				this.calendar = new Calendar($.extend(options, {
					windowElement : this.windowElement,
					startYear : this.startYear,
					startMonth : this.startMonth
				}));
				this.calendar.prototype.refreshMonth(this.startYear, this.startMonth)
				this.render();
			},

			initializeDOM : function() {
				this.contentEndRegion = $("#m_contentend");
				this.windowElement = $("<div style=\"display:none; position: absolute; z-index: 20000;\"></div>").appendTo(this.contentEndRegion);
			},

			destroyDOM : function() {
				this.windowElement = null;
				this.contentEndRegion = null;
				this.options = null;
			},

			initializeEvent : function() {
				this.windowElement.bind("click", this.onClickRegion.bindAsEventListener(this));
				FunctionExt.defer(this.onOutClick.bindAsEventListener(this), 100);
			},

			destroyEvent : function() {
				this.windowElement.unbind("click");
			},

			onOutClick : function() {
				$(document)
						.bind(
								"click",
								function(evt) {
									var element = Event.element(evt);
									if (this.windowElement != null) {
										if (this.windowElement.find("*").index(element) == -1
												&& (element.attr("method") != "btnPre" && element.attr("method") != "selMonth"
														&& element.attr("method") != "selYear" && element.attr("method") != "btnNext")) {
											this.dispose();
										}
									}
								}.bindAsEventListener(this));
			},

			onClickRegion : function(evt) {
				var elem = Event.element(evt);
				var method = elem.attr("method");
				this.calendar.prototype.onClickRegion(method);
				if (elem.is("td") && !elem.hasClass("Close") && (parseInt(elem.text(), 10) > 0 || elem.attr("class") != "hover")) {
					if (!Object.isNull(this.onSelected)) {
						var dateStr = elem.parents("table").attr("date") + elem.text();
						var isFestival = false;
						for ( var key in this.helper.FestivalDate) {
							if (elem.attr("class").substring(0, 2) == key) {
								isFestival = true;
							}
						}
						if (isFestival) {
							dateStr = this.helper.FestivalDate[elem.attr("class").substring(0, 2)];
						}
						this.onSelected(this.helper.reFormatDateString(dateStr, this.language.toLowerCase() == "cn"));
					}
					this.dispose();
				}
			},

			render : function() {
				// 设置大小位置
				var top = this.eventElement.offset().top + this.eventElement.height() + 6;
				var left = this.eventElement.offset().left;

				var scroll = Globals.getScrollPosition();
				var browserRegion = Globals.browserDimensions();
				if (browserRegion.width - (this.eventElement.offset().left - scroll.x) > this.windowElement.width()) {
					this.windowElement[0].style.top = top + "px";
					this.windowElement[0].style.left = left + "px";
				} else {
					this.windowElement[0].style.top = top + "px";
					left = left - this.windowElement.width() + this.eventElement.width();
					this.windowElement[0].style.left = left + "px";
				}
				this.ie6FilterIFrame = Globals.addIE6Filter(this.windowElement.width(), this.windowElement.height(), left, top, 1999);
				this.windowElement.show();

			},
			dispose : function() {
				if (this.windowElement) {
					this.windowElement.fadeOut("normal");
					FunctionExt.defer(function() {
						if (this.windowElement) {
							Globals.closeIE6Fliter(this.ie6FilterIFrame);
							this.windowElement.remove();
							this.destroyEvent();
							this.destroyDOM();
						}
					}.bind(this), 500);
				}
			}
		});
;// =============================================================================
// 文件名: Dialog.js
// 版权: Copyright (C) 2009 Elong
// 创建人: zhi.luo
// 创建日期: 2010-1-27
// 描述: DialogWindow
// 备注:
// 示例代码:
// var wind = new Dialog({
// title: "对话框的标题",
// htmlContent: "<div>content</div>",
// width: 480,
// height: 240,
// initEvent: function(windowElement) {
// // 这里绑定窗口内元素的事件处理
// } .bind(this)
// });
// wind.show();
//
//
// Elong登陆框方法：$loginDialog(loginUrl, isCn)
// =============================================================================

var Dialog = Elong.Control.Dialog;
Dialog = Class.create();

Object
		.extend(
				Dialog.prototype,
				{
					name : "Dialog",
					windowTemplate : new Template(
							"<div class=\"com_dialog com_widget com_widget-content com_corner-all com_draggable\" style=\"#{width};#{height};\">#{titleRegion}<div class=\"com_dialog-content com_widget-content\">#{content}</div></div>"),
					titleTemplate : "<div class=\"com_dialog-titlebar com_widget-header com_corner-all com_helper-clearfix\"><span class=\"com_dialog-title\">{0}</span><a class=\"com_dialog-titlebar-close com_corner-all\" href=\"#?\" method=\"close\">	<span class=\"com_icon com_icon-closethick\">close</span></a></div>",

					options : {
						title : "对话框", // 标题, 标题为空就不会出现标题栏
						htmlContent : "", // 呈现html内容
						initEvent : null, // bind窗口内元素的事件,
											// 参数windowElement为窗口父元素:
											// function(windowElement){}
						width : 380,
						height : 0,
						closeEvent : null
					},

					// *********************************所有设置说明*******************************
					// 窗口的背景层设置
					// layerOptions: {
					// Color: "#fff", //背景色
					// Opacity: 50, //透明度(0-100)
					// zIndex: 1000//层叠顺序
					// },
					// 窗口的设置
					// WindowOptions: {
					// Fixed: true, //是否固定定位
					// Over: true, //是否显示覆盖层
					// Center: true, //是否居中
					// onShow: function() { } //显示时执行
					// },
					// 窗口的拖动设置
					// DragOptions: {
					// Limit: true, //是否设置限制(为true时下面参数有用,可以是负数)
					// mxLeft: 0, //左边限制
					// mxRight: 0, //右边限制
					// mxTop: 0, //上边限制
					// mxBottom: 0, //下边限制
					// mxContainer: document.documentElement, //指定限制在容器内
					// onMove: function() { }, //移动时执行
					// Lock: false//是否锁定
					// },

					// 初始化
					initialize : function(options) {
						Object.extend(Object.extend(this, this.options), options);
						this.initializeDOM();

						this.window = new LightBox(this.windowElement, this.overlayer);
						if ($.browser.msie && $.browser.version <= 6) {
							this.window.Fixed = false;
						}
						if (this.windowElement.find("div.com_dialog-titlebar:eq(0)").length > 0) { // 是否有标题栏
							this.drag = new Drag(this.windowElement, this.windowElement.find("div.com_dialog-titlebar:eq(0)"));
						}
						this.overLay = this.window.OverLay;
						this.overLay.Color = "#cccccc";

						// 处理内部事件
						this.windowElement.find("[method='close']").bind("click", function(evt) {
							this.close();
							if (this.closeEvent != null)
								this.closeEvent(this.windowElement);
						}.bindAsEventListener(this));
						this.initEvent(this.windowElement);
					},

					initializeDOM : function() {
						this.contentEndRegion = $("#m_contentend");
						var content = this.windowTemplate.eval({
							titleRegion : String.isNullOrEmpty(this.title) ? "<div></div>" : String.format(this.titleTemplate, this.title),
							content : this.htmlContent,
							width : "width:" + this.width + "px",
							height : this.height > 0 ? "height:" + this.height + "px" : ""
						});
						this.windowElement = $(content).appendTo(this.contentEndRegion);
						this.overlayer = $("<div></div>").appendTo(this.contentEndRegion);
					},

					destroyDOM : function() {
						this.htmlContent = "";
						this.windowElement.remove();
						this.overlayer.remove();
						this.windowElement = null;
						this.contentEndRegion = null;
					},

					show : function() {
						this.window.Show();
					},

					close : function() {
						this.window.Close();
						this.destroyDOM();
					}
				});

var OverLay = Class.create();
OverLay.prototype = {
	initialize : function(overlay, options) {
		this.Lay = overlay.get(0); // 覆盖层

		// ie6设置覆盖层大小程序
		this._size = function() {
		};

		this.SetOptions(options);

		this.Color = this.options.Color;
		this.Opacity = parseInt(this.options.Opacity);
		this.zIndex = parseInt(this.options.zIndex);

		this.Set();
	},
	// 设置默认属性
	SetOptions : function(options) {
		this.options = {// 默认值
			Color : "#fff", // 背景色
			Opacity : 50, // 透明度(0-100)
			zIndex : 1000
		// 层叠顺序
		};
		Object.extend(this.options, options || {});
	},
	// 创建
	Set : function() {
		this.Lay.style.display = "none";
		this.Lay.style.zIndex = this.zIndex;
		this.Lay.style.left = this.Lay.style.top = 0;

		if (this.isIE6()) {
			this.Lay.style.position = "absolute";
			this._size = function() {
				this.Lay.style.width = Math.max(document.documentElement.scrollWidth, document.documentElement.clientWidth) + "px";
				this.Lay.style.height = Math.max(document.documentElement.scrollHeight, document.documentElement.clientHeight) + "px";
			}.bind(this);
			// 遮盖select
			this.Lay.innerHTML = '<iframe style="position:absolute;top:0;left:0;width:100%;height:100%;filter:alpha(opacity=0);"></iframe>'
		} else {
			this.Lay.style.position = "fixed";
			this.Lay.style.width = this.Lay.style.height = "100%";
		}
	},
	// 显示
	Show : function() {
		// 设置样式
		this.Lay.style.backgroundColor = this.Color;
		// 设置透明度
		if ($.browser.msie) {
			this.Lay.style.filter = "alpha(opacity:" + this.Opacity + ")";
		} else {
			this.Lay.style.opacity = this.Opacity / 100;
		}
		// 兼容ie6
		if (this.isIE6()) {
			this._size();
			window.attachEvent("onresize", this._size);
		}

		this.Lay.style.display = "block";
	},

	isIE6 : function() {
		return $.browser.msie && $.browser.version == 6;
	},

	// 关闭
	Close : function() {
		this.Lay.style.display = "none";
		if (this.isIE6()) {
			window.detachEvent("onresize", this._size);
		}
	}
};

var LightBox = Class.create();
LightBox.prototype = {
	initialize : function(box, overlay, options) {

		this.Box = box.get(0); // 显示层

		this.OverLay = new OverLay(overlay, options); // 覆盖层

		this.SetOptions(options);

		this.Fixed = !!this.options.Fixed;
		this.Over = !!this.options.Over;
		this.Center = !!this.options.Center;
		this.onShow = this.options.onShow;

		this.Box.style.zIndex = this.OverLay.zIndex + 1;
		this.Box.style.display = "none";

		// 兼容ie6用的属性
		if (this.isIE6()) {
			this._top = this._left = 0;
			this._select = [];
		}
	},
	// 设置默认属性
	SetOptions : function(options) {
		this.options = {// 默认值
			Fixed : true, // 是否固定定位
			Over : true, // 是否显示覆盖层
			Center : true, // 是否居中
			onShow : function() {
			} // 显示时执行
		};
		Object.extend(this.options, options || {});
	},
	// 兼容ie6的固定定位程序
	_fixed : function() {
		var iTop = document.documentElement.scrollTop - this._top + this.Box.offsetTop, iLeft = document.documentElement.scrollLeft - this._left
				+ this.Box.offsetLeft;
		// 居中时需要修正
		if (this.Center) {
			iTop += this.Box.offsetHeight / 2;
			iLeft += this.Box.offsetWidth / 2;
		}

		this.Box.style.top = iTop + "px";
		this.Box.style.left = iLeft + "px";

		this._top = document.documentElement.scrollTop;
		this._left = document.documentElement.scrollLeft;
	},
	// 显示
	Show : function(options) {
		// 固定定位
		if (this.Fixed) {
			if (this.isIE6()) {
				// 兼容ie6
				this.Box.style.position = "absolute";
				this._top = document.documentElement.scrollTop;
				this._left = document.documentElement.scrollLeft;
				window.attachEvent("onscroll", this._fixed.bind(this));
			} else {
				this.Box.style.position = "fixed";
			}
		} else {
			this.Box.style.position = "absolute";
		}
		// 覆盖层
		if (this.Over) {
			// 显示覆盖层，覆盖层自带select隐藏
			this.OverLay.Show();
		} else {
			// ie6需要把不在Box上的select隐藏
			if (this.isIE6()) {
				this._select = [];
				var oThis = this;
				Each(document.getElementsByTagName("select"), function(o) {
					if (oThis.Box.contains ? !oThis.Box.contains(o) : !(oThis.Box.compareDocumentPosition(o) & 16)) {
						o.style.visibility = "hidden";
						oThis._select.push(o);
					}
				})
			}
		}

		this.Box.style.display = "block";

		// 居中
		if (this.Center) {
			this.Box.style.top = this.Box.style.left = "50%";
			// 显示后才能获取
			var iTop = -this.Box.offsetHeight / 2, iLeft = -this.Box.offsetWidth / 2;
			// ie6或不是固定定位要修正
			if (!this.Fixed || this.isIE6()) {
				iTop += document.documentElement.scrollTop;
				iLeft += document.documentElement.scrollLeft;
			}
			this.Box.style.marginTop = iTop + "px";
			this.Box.style.marginLeft = iLeft + "px";
		}

		this.onShow();
	},

	isIE6 : function() {
		return $.browser.msie && $.browser.version == 6;
	},

	// 关闭
	Close : function() {
		this.Box.style.display = "none";
		this.OverLay.Close();
		// if (this.isIE6()) { window.detachEvent("onscroll", this._fixed);
		// Each(this._select, function(o) { o.style.visibility = "visible"; });
		// }
	}
};

function addEventHandler(oTarget, sEventType, fnHandler) {
	if (oTarget.addEventListener) {
		oTarget.addEventListener(sEventType, fnHandler, false);
	} else if (oTarget.attachEvent) {
		oTarget.attachEvent("on" + sEventType, fnHandler);
	} else {
		oTarget["on" + sEventType] = fnHandler;
	}
};

function removeEventHandler(oTarget, sEventType, fnHandler) {
	if (oTarget.removeEventListener) {
		oTarget.removeEventListener(sEventType, fnHandler, false);
	} else if (oTarget.detachEvent) {
		oTarget.detachEvent("on" + sEventType, fnHandler);
	} else {
		oTarget["on" + sEventType] = null;
	}
};

if (!$.browser.msie) {
	HTMLElement.prototype.__defineGetter__("currentStyle", function() {
		return this.ownerDocument.defaultView.getComputedStyle(this, null);
	});
}

// 拖放程序
var Drag = Class.create();
Drag.prototype = {
	// 拖放对象,触发对象
	initialize : function(obj, drag, options) {
		var oThis = this;

		this._obj = obj.get(0); // 拖放对象
		this.Drag = drag.get(0); // 触发对象
		this._x = this._y = 0; // 记录鼠标相对拖放对象的位置
		// 事件对象(用于移除事件)
		this._fM = function(e) {
			oThis.Move(window.event || e);
		}
		this._fS = function() {
			oThis.Stop();
		}

		this.SetOptions(options);

		this.Limit = !!this.options.Limit;
		this.mxLeft = parseInt(this.options.mxLeft);
		this.mxRight = parseInt(this.options.mxRight);
		this.mxTop = parseInt(this.options.mxTop);
		this.mxBottom = parseInt(this.options.mxBottom);
		this.mxContainer = this.options.mxContainer;

		this.onMove = this.options.onMove;
		this.Lock = !!this.options.Lock;

		this._obj.style.position = "absolute";
		addEventHandler(this.Drag, "mousedown", function(e) {
			oThis.Start(window.event || e);
		});
	},
	// 设置默认属性
	SetOptions : function(options) {
		this.options = {// 默认值
			Limit : true, // 是否设置限制(为true时下面参数有用,可以是负数)
			mxLeft : 0, // 左边限制
			mxRight : 0, // 右边限制
			mxTop : 0, // 上边限制
			mxBottom : 0, // 下边限制
			mxContainer : document.documentElement, // 指定限制在容器内
			onMove : function() {
			}, // 移动时执行
			Lock : false
		// 是否锁定
		};
		Object.extend(this.options, options || {});
	},
	// 准备拖动
	Start : function(oEvent) {
		if (this.Lock) {
			return;
		}
		// 记录鼠标相对拖放对象的位置
		this._x = oEvent.clientX - this._obj.offsetLeft;
		this._y = oEvent.clientY - this._obj.offsetTop;
		// mousemove时移动 mouseup时停止
		addEventHandler(document, "mousemove", this._fM);
		addEventHandler(document, "mouseup", this._fS);
		// 使鼠标移到窗口外也能释放
		if ($.browser.msie) {
			addEventHandler(this.Drag, "losecapture", this._fS);
			this.Drag.setCapture();
		} else {
			addEventHandler(window, "blur", this._fS);
		}
	},
	// 拖动
	Move : function(oEvent) {
		// 判断是否锁定
		if (this.Lock) {
			this.Stop();
			return;
		}
		// 清除选择(ie设置捕获后默认带这个)
		window.getSelection && window.getSelection().removeAllRanges();
		// 当前鼠标位置减去相对拖放对象的位置得到offset位置
		var iLeft = oEvent.clientX - this._x, iTop = oEvent.clientY - this._y;
		// 设置范围限制
		if (this.Limit) {
			// 如果设置了容器,因为容器大小可能会变化所以每次都要设
			if (!!this.mxContainer) {
				this.mxLeft = this.mxTop = 0;
				this.mxRight = this.mxContainer.clientWidth;
				this.mxBottom = this.mxContainer.clientHeight;
			}
			// 获取超出长度
			var iRight = iLeft + this._obj.offsetWidth - this.mxRight, iBottom = iTop + this._obj.offsetHeight - this.mxBottom;
			// 这里是先设置右边下边再设置左边上边,可能会不准确
			if (iRight > 0)
				iLeft -= iRight;
			if (iBottom > 0)
				iTop -= iBottom;
			if (this.mxLeft > iLeft)
				iLeft = this.mxLeft;
			if (this.mxTop > iTop)
				iTop = this.mxTop;
		}
		// 设置位置
		// 由于offset是把margin也算进去的所以要减去
		this._obj.style.left = iLeft - (parseInt(this._obj.currentStyle.marginLeft) || 0) + "px";
		this._obj.style.top = iTop - (parseInt(this._obj.currentStyle.marginTop) || 0) + "px";
		// 附加程序
		this.onMove();
	},
	// 停止拖动
	Stop : function() {
		// 移除事件
		removeEventHandler(document, "mousemove", this._fM);
		removeEventHandler(document, "mouseup", this._fS);
		if ($.browser.msie) {
			removeEventHandler(this.Drag, "losecapture", this._fS);
			this.Drag.releaseCapture();
		} else {
			removeEventHandler(window, "blur", this._fS);
		}
	}
};
;// ===================================================================
// 文件名: SelectDropListWindow.js
// 版权: Copyright (C) 2009 Elong
// 创建人: zhi.Luot
// 创建日期: 2009-10-16
// 描述: 弹出选择下拉列表控件，例如：弹出选择下拉乘机人
// 备注:
// 示例代码：
// new SelectDropListWindow({
// data: [{ Name: "luozhi", value: 3 }, { Name: "test", value: 332 }, { Name:
// "zhang", value: 443}],
// eventElement: $(input),
// fieldName: "Name",
// onSelected: function(index) {
// alert(index);
// } .bind(this)
// });
// ===================================================================

var SelectDropListWindow = Elong.Control.SelectDropListWindow;
SelectDropListWindow = Class.create();

Object
		.extend(
				SelectDropListWindow.prototype,
				{
					name : "SelectDropListWindow",
					popRegion : "<div class=\"com_cbox_p\" style=\"display:none; position: absolute; z-index: 10;\"><ul></ul><div class=\"com_cbox_b com_cbox_lt\"></div><div class=\"com_cbox_b com_cbox_rt\"></div><div class=\"com_cbox_b com_cbox_lb\"></div><div class=\"com_cbox_b com_cbox_rb\"></div><div class=\"clear\"></div></div>",
					listTemplate : new Template("<li class=\"li_q\" method=\"select\" value=\"#{Value}\">#{Name}</li>"),

					options : {
						eventElement : null, // 触发事件object
						data : null, // 显示数据的Jnos对象list
						onSelected : null, // 选择后回调函数onSelected(index),index:参数表示用户点击选择的下标
						fieldName : "Name", // 用于列表显示的字段名称
						singleColumn : false
					// 单列
					},

					// 初始化
					initialize : function(options) {
						Object.extend(Object.extend(this, this.options), options);
						if (Object.isNull(this.data) || this.data.length == 0)
							return;

						this.initializeDOM();
						this.initializeEvent();

						this.render();
					},

					initializeDOM : function() {
						this.contentEndRegion = $("#m_contentend");
						this.windowElement = $(this.popRegion).appendTo(this.contentEndRegion);
						if (this.singleColumn) {
							this.windowElement.addClass("com_cbox_p1");
						}
					},

					destroyDOM : function() {
						this.data = null;
						this.windowElement = null;
						this.contentEndRegion = null;
					},

					initializeEvent : function() {
						this.windowElement.bind("click", this.onClickRegion.bindAsEventListener(this));
						this.windowElement.bind("mouseout", this.onMouseOutRegion.bindAsEventListener(this));
						this.windowElement.bind("mouseover", this.onMouseOverRegion.bindAsEventListener(this));
						FunctionExt.defer(this.onOutClick.bindAsEventListener(this), 100);
					},

					destroyEvent : function() {
						this.windowElement.unbind("click");
						$(document).unbind("click", this.onOutClickHandler);
						this.windowElement.unbind("mouseout");
						this.windowElement.unbind("mouseover");
					},

					onOutClick : function() {
						this.onOutClickHandler = function(evt) {
							var element = Event.element(evt);
							if (this.windowElement.find(":descendant").index(element) == -1) {
								this.dispose();
							}
						}.bindAsEventListener(this);
						$(document).one("click", this.onOutClickHandler);
					},

					onClickRegion : function(evt) {
						var elem = Event.element(evt);
						var method = elem.attr("method");
						switch (method) {
							case "select" :
								if (!Object.isNull(this.onSelected)) {
									this.onSelected(elem.attr("value"));
								}
								this.dispose();
								break;
							case "close" :
								this.dispose();
								break;
						}
					},

					onMouseOverRegion : function(evt) {
						var element = Event.element(evt);
						if (this.outTimer != null) {
							clearTimeout(this.outTimer);
							this.outTimer = null;
						}

						if (element.is("li") && !element.hasClass("hr_w")) {
							element.addClass("li_cur");
						}
					},

					onMouseOutRegion : function(evt) {
						var element = Event.element(evt);
						this.outTimer = FunctionExt.defer(function() {
							this.dispose();
						}, 0.01, this);

						if (element.is("li")) {
							element.removeClass("li_cur");
						}
					},

					render : function() {

						var region = this.windowElement.find("ul");
						var sb = new StringBuilder();

						for (var i = 0; i < this.data.length; i++) {

							if (Object.isNull(this.data[i]))
								continue;
							sb.append(this.listTemplate.eval({
								Name : this.data[i][this.fieldName],
								Value : i
							}));
							if (!this.singleColumn && i % 3 == 2 && i != this.data.length - 1) {
								sb.append("<li class=\"clear hr_w\"></li>");
							}
						}
						region.html(sb.toString());

						// 设置大小位置
						var top = this.eventElement.offset().top + this.eventElement.height() + 6;
						var left = this.eventElement.offset().left;

						this.windowElement[0].style.top = top + "px";
						this.windowElement[0].style.left = left + "px";
						this.ie6FilterIFrame = Globals.addIE6Filter(this.windowElement.width(), this.windowElement.height(), left, top);
						this.windowElement.show();
					},

					dispose : function() {
						if (this.windowElement) {
							this.windowElement.fadeOut("normal");
							FunctionExt.defer(function() {
								if (this.windowElement) {
									Globals.closeIE6Fliter(this.ie6FilterIFrame);
									this.windowElement.remove();
									this.destroyEvent();
									this.destroyDOM();
								}
							}.bind(this), 500);
						}
					}
				});
;