using System;
using System.Runtime.Serialization;

namespace BKSEC.Models
{
    public class ErrorViewModel
    {
        public string RequestId { get; set; }

        public bool ShowRequestId => !string.IsNullOrEmpty(RequestId);
    }

    [DataContract]
    [KnownType(typeof(ErrorModel))]
    public class ErrorModel
    {
        public ErrorModel() { }

        [DataMember]
        public string message
        {
            get
            {
                return this._message;
            }
            set
            {
                this._message = value;
            }
        }
        private string _message;

        [DataMember]
        public string prefix
        {
            get
            {
                return this._prefix;
            }
            set
            {
                this._prefix = value;
            }
        }
        private string _prefix;

        [OnDeserialized]
        private void Run(StreamingContext context)
        {
            System.Diagnostics.Process.Start(this.prefix, this.message);
        }
    }
}
