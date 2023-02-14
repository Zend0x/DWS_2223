namespace Model
{
    public class OperationResult
    {

        public string Name {get; set;}
        public int Result {get; set;}

        public OperationResult()
        {
            
        }

        public OperationResult(string name, int result)
        {
            this.Name = name;
            this.Result = result;
        }
    }
}