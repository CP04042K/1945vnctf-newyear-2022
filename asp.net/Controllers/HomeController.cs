using BKSEC.Models;
using BKSEC.Models.NormalUser;
using BKSEC.Models.AdminUser;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using System;
using System.IO;
using System.Text;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;
using System.Runtime.Serialization;

namespace BKSEC.Controllers
{
    public class HomeController : Controller
    {
        private readonly ILogger<HomeController> _logger;
        private bool _isAdmin = false;

        public HomeController(ILogger<HomeController> logger)
        {
            _logger = logger;
        }

        [HttpGet]
        public IActionResult Index()
        {
            return View();
        }

        [HttpPost]
        public IActionResult Index(LoginInfoModel info)
        {
            string name = info.Name;
            string pass = info.Pass;
            string auth;
            if (this.CheckAdmin(name, pass))
                auth = AdminUserModel.Serialize(Hash(Encoding.UTF8.GetBytes(name + "||" + pass)));
            else
                auth = NormalUserModel.Serialize(Hash(Encoding.UTF8.GetBytes(name + "||" + pass)));
            ViewData["auth"] = auth;
            return View();
        }

        [HttpGet]
        public IActionResult Start()
        {
            return View();
        }

        [HttpPost]
        public IActionResult Start(string auth)
        {
            if (string.IsNullOrWhiteSpace(auth))
                return Redirect("/Home/Index");
            try
            {
                UserModel user;
                if (this._isAdmin)
                    user = UserModel.Deserial<AdminUserModel>(auth);
                else
                    user = UserModel.Deserial<NormalUserModel>(auth);
                ViewData["flag"] = user.flag;
            }
            catch (Exception ex)
            {
                ViewData["flag"] = "Give me the authentication ID. PLZZ";
            }
            return View();
        }

        [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
        public IActionResult Error()
        {
            return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
        }

        public static string Hash(byte[] input)
        {
            System.Security.Cryptography.MD5 md5 = System.Security.Cryptography.MD5.Create(); // md5
            byte[] hash = md5.ComputeHash(input);
            StringBuilder sb = new StringBuilder();
            for (int i = 0; i < hash.Length; i++)
            {
                sb.Append(hash[i].ToString("X2"));
            }
            return sb.ToString();
        }

        public static string Hash(string input) // de-hex
        {
            byte[] a = new byte[input.Length / 2];
            for (int i = 0, h = 0; h < input.Length; i++, h += 2)
            {
                a[i] = (byte)Int32.Parse(input.Substring(h, 2), System.Globalization.NumberStyles.HexNumber);
            }
            return Hash(a);
        }

        public bool CheckAdmin(string user, string pass)
        {
            this._isAdmin = false;
            if (user.StartsWith("41646D696E6973747261746F72") && pass.Contains("537570657250617373776F7264") && user != pass)
            {
                if (Hash(user) == Hash(pass))
                {
                    this._isAdmin = true;
                }
            }
            return this._isAdmin;
        }
    }
}
