using System;
using System.IO;
using System.Runtime.Serialization;

namespace BKSEC.Models.NormalUser
{
    [DataContract]
    public class NormalUserModel : UserModel
    {
        public NormalUserModel(string id) : base(id)
        {
            this.flag = "Normal user doesn't have flag";
        }

        public static string Serialize(string id)
        {
            MemoryStream mem = new MemoryStream();
            DataContractSerializer format = new DataContractSerializer(typeof(NormalUserModel));
            format.WriteObject(mem, new NormalUserModel(id));
            return Convert.ToBase64String(mem.ToArray());
        }
    }
}
