using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SummaMoveWPF.Models
{
    public class Oefeningen
    {
        private int id;

        public int ID
        {
            get { return id; }
            set { id = value; }
        }

        private string naam_NL;

        public string Naam_NL
        {
            get { return naam_NL; }
            set { naam_NL = value; }
        }

        private string naam_EN;

        public string Naam_EN
        {
            get { return naam_EN; }
            set { naam_EN = value; }
        }

        private string omschrijving_NL;

        public string Omschrijving_NL
        {
            get { return omschrijving_NL; }
            set { omschrijving_NL = value; }
        }

        private string omschrijving_EN;

        public string Omschrijving_EN
        {
            get { return omschrijving_EN; }
            set { omschrijving_EN = value; }
        }

    }
}
