using Microsoft.AspNetCore.Mvc;
using Model;

namespace TodoApi.Controllers;

[ApiController]
[Route("[controller]")]
public class FactorialController : ControllerBase
{
    private readonly ILogger<FactorialController> _logger;

    public FactorialController(ILogger<FactorialController> logger)
    {
        _logger = logger;
    }

    [HttpGet]
    public IActionResult Get(int x)
    {
        OperationResult operationResult = new OperationResult();
        operationResult.Name = "factorial";
        operationResult.Result = Operations.CalcularFactorial(x);
        return Ok(operationResult);

    }
}


