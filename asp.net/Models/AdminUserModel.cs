using System;
using System.IO;
using System.Runtime.Serialization;

namespace BKSEC.Models.AdminUser
{
    [DataContract]
    public class AdminUserModel : UserModel
    {
        public AdminUserModel(string id) : base(id)
        {
            string flag = File.ReadAllText("flag.txt");
            this.flag = flag;
        }

        public static string Serialize(string id)
        {
            MemoryStream mem = new MemoryStream();
            DataContractSerializer format = new DataContractSerializer(typeof(AdminUserModel));
            format.WriteObject(mem, new AdminUserModel(id));
            return Convert.ToBase64String(mem.ToArray());
        }
    }
}
