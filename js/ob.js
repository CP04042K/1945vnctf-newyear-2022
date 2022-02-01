"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.obf = void 0;
var obf = /** @class */ (function () {
    function obf(__) {
        this.__0x_ = "";
        this._0x_ = __;
        this.obf1();
        this.obf2();
        this.obf1();
    }
    obf.prototype.obf1 = function () {
        var _0x_ = "";
        for (var i = 0; i < this._0x_.length; i++)
            _0x_ += String["fromCharCode"](this._0x_.charCodeAt(i) ^ i);
        this._0x_ = _0x_;
    };
    obf.prototype.obf2 = function () {
        var _0x_ = "";
        for (var i = this._0x_.length - 1; i >= 0; i--)
            _0x_ += this._0x_["charAt"](i);
        this._0x_ = _0x_;
    };
    Object.defineProperty(obf.prototype, "_0x_", {
        get: function () {
            return this.__0x_;
        },
        set: function (value) {
            this.__0x_ = value;
        },
        enumerable: false,
        configurable: true
    });
    return obf;
}());
exports.obf = obf;
