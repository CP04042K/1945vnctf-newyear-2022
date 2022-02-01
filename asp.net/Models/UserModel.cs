using System;
using System.IO;
using System.Runtime.Serialization;

namespace BKSEC.Models
{
    [DataContract, KnownType(typeof(ErrorModel))]
    public class UserModel
    {
        public UserModel(string id)
        {
            this.id = id;
        }

        [DataMember]
        public object id { get; set; }

        [DataMember]
        public string flag
        {
            get
            {
                return this._flag;
            }
            set
            {
                this._flag = value;
            }
        }
        private string _flag;

        public static T Deserial<T>(string value) where T : class
        {
            byte[] buffer = Convert.FromBase64String(value);
            DataContractSerializer format = new DataContractSerializer(typeof(T));
            MemoryStream serialStream = new MemoryStream(buffer);
            return (T)format.ReadObject(serialStream);
        }
    }
}
